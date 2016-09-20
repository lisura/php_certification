# E-mail Injection

## Open mail relay

Um pen mail relay é um servidor SMTP configurado de tal forma que ele permite que qualquer pessoa na Internet para enviar e-mails através dele, não apenas e-mail com destino ou origens de usuários conhecidos. Isto costumava ser a configuração padrão em muitos servidores de e-mail; na verdade, era a forma como a Internet foi inicialmente criado, mas Open mail relay tornaram-se impopular por causa de sua exploração por spammers e worms.




injeção de e-mail é um tipo de ataque de injeção que atinge o PHP construído em função mail. Ele permite que o invasor mal-intencionado para injetar qualquer um dos campos de cabeçalho de correio como, BCC, CC, Assunto, etc., o que permite que o hacker para enviar spam a partir de suas vítimas "servidor de correio através de suas vítimas" formulário de contato. Por esta razão, este ataque é chamado de injeção e-mail ou formulário de correio spam. Esta vulnerabilidade não está limitado a PHP. Ele pode afetar qualquer aplicativo que envia mensagens de e-mail baseado na entrada de usuários arbitrários. A principal razão deste ataque é a validação de entrada do usuário impróprio ou que não há validação e filtração em tudo. http://resources.infosecinstitute.com/email-injection/

http://www.thesitewizard.com/php/protect-script-from-email-injection.shtml

https://en.wikipedia.org/wiki/Open_mail_relay


EMAIL / SMTP
- DO NOT PROVIDE OPEN RELAYS
- OPEN THE SMTP PORT ONLY IF ESSENTIAL
- USE A "TARPITS" TECHNIQUE TO SLOW REQUESTS AS A MEANS OF DISSUADING
ATTACKS
