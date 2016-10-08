# E-mail Injection

## Open mail relay

Um open mail relay é um servidor SMTP configurado de tal forma que ele permite que qualquer pessoa na Internet possa enviar e-mails através dele, não apenas e-mail com destino ou origens de usuários conhecidos. Isto costumava ser a configuração padrão em muitos servidores de e-mail; na verdade, era a forma como a Internet foi inicialmente criado, mas Open mail relay tornou-se impopular por causa de sua exploração por spammers e worms.

E-mail injection é um tipo de ataque de injeção que atinge o PHP construído usando a função mail. Ele permite que o invasor mal-intencionado possa injetar em qualquer um dos campos de formulário um cabeçalho de e-mail como: BCC, CC, Assunto, etc. Isso permite que o invasor possa enviar spam através de formulário de contato de suas vitimas.

Este ataque não é limitado ao PHP, ele pode afetar qualquer aplicativo que envia mensagens de e-mail baseado na entrada de usuários arbitrários. A principal razão deste ataque é o uso inapropriado de validações no inputs de formulários.

### Entendendo o ataque

Para entender como funciona vamos analisar o função mail do PHP

>bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )

```php
<?php
 $to="backtothe@future.com";
 if (!isset($_POST["send"])){
   ?>
   <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
   To: backtothe@future.com
   From: <input type="text" name="sender">
   Subject : <input type="text" name="subject">
   Message :
   <textarea name="message" rows="10" cols="60" lines="20"></textarea>
   <input type="submit" name="send" value="Send">
   </form>
   <?
 }else{
   $from=$_POST['sender'];
   if (mail($to,$_POST['subject'],$_POST['message'],"From: $from\n")){ly
     echo "Your mail was indeed sent to $to.";
 }else{
    echo "Doh! Your mail could not be sent.";
   }
 }
 ?>
```
No formulário o invasor mal-intencionado pode completar o "header" do e-mail com outras informações

>"Marty_McFly@back.to%0ACc:Dr_Emmett_Brown@back.to%0ABcc:Lorraine_Baines@back.to,George_McFly@back.to"

Neste exemplo o e-mail é enviado para todos os e-mail listados.

### DON'T PANIC

Calma, tudo tem solução:

Solução mais simples e direta usando **regexps**

```php
<?php
  $from = $_POST["sender"];
  $from = urldecode($from);
  if (eregi("(\r|\n)", $from)) {
    die("Why ?? :(");
  }
```

Você pode usar o component **Zend_Mail** como usa classe de envio de e-mail.
Ela prove proteção para este problema por padrão, nem uma ação adicional é requirida

Outra opção é **Swift Mailer** , esta classe não é vulnerável a este ataque.

Outras soluções para lidar com estes ataques são **PEAR Mail**, **Suhosin** e **modsecurity**.

> Nota: Pessoalmente eu já usei e gostei do PHPMailer.

### TARPITS

Uma das possíveis vias que foram consideradas para combater o envio de spam, era para impor uma pequena taxa de tempo para cada e-mail enviado. Com a introdução de tais custos, com impacto insignificante aos usuários, o envio de spam automatizado e em massa iria se tornar instantaneamente sem atrativos. Tarpitting poderia ser visto como uma abordagem semelhante (mas tecnicamente muito menos complexo), onde o custo para o spammer seria medido em termos de tempo e de eficácia, em vez de dinheiro.
