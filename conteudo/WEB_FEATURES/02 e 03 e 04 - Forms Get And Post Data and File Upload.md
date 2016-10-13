## Forms

Uma das características mais fortes do PHP é o jeito como ele trata formulários HTML. O conceito básico que é importante entender é que qualquer elemento de formulário em um formulário irá automaticamente ficar disponível para você usá-los em seus scripts PHP.

 As variáveis $\_POST[] e $\_GET[] são criadas automaticamente pelo PHP. Anteriormente utilizamos $\_SERVER. Perceba como o method (modo) do formulário DEFINE o tipo de envio. Se fosse utilizado o modo GET então os dados do formulário acabariam na superglobal $\_GET. Você também pode utilizar a superglobal $\_REQUEST, se não se importar qual a origem do dado enviado. Ele conterá os dados mesclados de origens GET, POST e COOKIE.

### Form

> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Forms/form1.html)

### Upload Form

> Exemplo :  [LINK](https://github.com/lisura/php_certification/tree/master/Examples/WEB_FEATURES/Forms/form2.php)
