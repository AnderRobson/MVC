<?php


namespace Source\Support;

use Exception;
use stdClass;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    /** @var PHPMailer */
    private $mail;

    /** @var stdClass */
    private $data;

    /** @var Exception */
    private $error;

    public function __construct()
    {
        /** @author : Ander Robson
         *
         * Description :
         */
        $this->mail = new PHPMailer(true);
        $this->data = new stdClass();

        /** @author : Ander Robson
         *
         * Description :
         *  mail->isSMTP = Sempre será um desparo por SMTP.
         *  mail->isHTML = Sempre será um desparo vindo da body.
         *  mail->setLanguage = Definindo a linguagem utilizada.
         */
        $this->mail->isSMTP();
        $this->mail->isHTML();
        $this->mail->setLanguage("br");

        /** @author : Ander Robson
         *
         * Description :
         *  mail->SMTPAuth = Sempre solicitar a autenticação do servidor SMTP
         *  mail->MTPSecure = Padrão da hospedagem.
         *  mail->CharSet = CharSet - UTF-8
         */
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = "tls";
        $this->mail->CharSet = "utf-8";

        $this->mail->Host = MAIL["host"];
        $this->mail->Port = MAIL["port"];
        $this->mail->Username = MAIL["user"];
        $this->mail->Password = MAIL["passwd"];
    }

    /** @author  : Ander Robson
     *
     *  Description : Montagem do e-mail sem anexos.
     *   $subject = Assunto.
     *   $body = Corpo da menssagem.
     *   $recipient_name = Nome de quem está enviando.
     *   $recipient_email = E-mail da pessoa que está enviando.
     */
    public function add(string $subject, string $body, string $recipient_name, string $recipiente_email): Email
    {
        $this->data->subject = $subject;
        $this->data->body = $body;
        $this->data->recipient_name = $recipient_name;
        $this->data->recipient_email = $recipiente_email;

        return $this;
    }

    /** @author : Ander Robson
     *
     * Description : Montagem de anexos
     *  $filePath = Caminho do arquivo.
     *  $fileName = Nome do arquivo.
     */
    public function attach(string $filePath, string $fileName): Email
    {
        $this->data->attach[$filePath] = $fileName;

        return $this;
    }

    /** @author : Ander Robson
     *
     * Description :
     *  $
     */
    public function send(string $from_name = MAIL["from_name"], string $from_email = MAIL["from_email"]): bool
    {
        try{
            $this->mail->Subject = $this->data->subject;
            $this->mail->msgHTML($this->data->body);
            $this->mail->addAddress($this->data->recipient_email, $this->data->recipient_name);
            $this->mail->setFrom($from_email, $from_name);

            if (!empty(($this->data->attach))) {
                foreach ($this->data->attach as $path => $name) {
                    $this->mail->addAttachment($path, $name);
                }
            }

            $this->mail->send();

            return true;
        } catch (Exception $exception) {
            $this->error = $exception;

            return false;
        }
    }

    public function error(): ?Exception
    {
        return $this->error;
    }
}