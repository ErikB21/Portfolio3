<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Message; // Importa il modello Message
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Importa il logger
use Illuminate\Support\Facades\Validator; // Importa il validatore

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validazione dei campi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:5000'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'failed', 'response' => $validator->errors()], 422);
        }

        // Sanitizzazione dei dati
        $name = $this->sanitizeName($request->input('name'));
        $email = $this->sanitizeInput($request->input('email'));
        $subject = $this->sanitizeInput($request->input('subject'));
        $body = $this->sanitizeInput($request->input('message'));

         // Imposta l'ID dell'amministratore (ad esempio, l'ID 1)
        $adminUserId = 1; // Cambia questo con l'ID del tuo utente amministratore

        // Salva il messaggio nel database
        Message::create([
            'user_id' => $adminUserId, // Assegna l'ID dell'amministratore
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $body,
        ]);

        // Inizializza PHPMailer
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST', 'sandbox.smtp.mailtrap.io');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME', 'b74487c316de22');
            $mail->Password = env('MAIL_PASSWORD', '894ba381694d7e');
            $mail->SMTPSecure = 'tls';
            $mail->Port = env('MAIL_PORT', 2525);

            // Configura i dettagli dell'email
            $mail->setFrom($email, $name);
            $mail->addAddress('erik.borgogno.dev@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = "$subject ($email)";
            $mail->Body = nl2br($body); // Converti nuove righe in <br>

            $mail->send();

            return response()->json(['status' => 'success', 'response' => 'Email sent successfully!']);
        } catch (Exception $e) {
            Log::error('Email error: '.$e->getMessage());
            return response()->json(['status' => 'failed', 'response' => "Email could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
        }
    }

    // Funzione per sanitizzare l'input generale
    private function sanitizeInput($input)
    {
        // Consenti lettere, numeri e alcuni caratteri speciali, rimuovendo tutto il resto
        return htmlspecialchars(preg_replace('/[^\w\s\-\.,@]/u', '', $input), ENT_QUOTES, 'UTF-8');
    }

    // Funzione per sanitizzare specificamente il nome
    private function sanitizeName($name)
    {
        // Rimuovi i caratteri di markup e sanitize
        return htmlspecialchars(strip_tags(trim($name)), ENT_QUOTES, 'UTF-8');
    }
}
