##Introdução

Apartir do PHP 5, o modelo de objetos foi rescrito para permitir melhor performance e mais funcionalidades. Esta é uma grande modificação do PHP 4. PHP 5 tem um modelo de objetos completo.

Entre outras novidades do PHP 5 estão a inclusão de visibility, classes e metodos abstract e final, additional metodos mágicos, interfaces, clonagem e dica de tipo.

>A visibility de uma propriedade ou método pode ser definida prefixando a declaração com as palavras-chave: public, protected or private. Itens declarados como públicos podem ser acessados de qualquer lugar. Membros declarados como protegidos só podem ser acessados na classe declarante e suas classes herdeiras. Membros declarados como privados só podem ser acessados na classe que define o membro privado.

>O PHP 5 introduz métodos e classes abstratas. Classes definidas como abstratas não podem ser instanciadas, e qualquer classe que contenha ao menos um método abstrato também deve ser abstrata. Métodos são definidos como abstratos declarando a intenção em sua assinatura - não podem definir a implementação.

>Interfaces de objetos permitem a criação de códigos que especificam quais métodos uma classe deve implementar, sem definir como esses métodos serão tratados.

>Ao se clonar um objeto, o PHP 5 fará uma cópia superficial de todas as propriedades do objeto. Qualquer propriedade que seja referência a outra variável, permanecerá como referência.


O PHP trata objetos da mesma maneira que referencias ou manipuladores, significando que cada variável contém uma referencia a um objeto ao invés de uma cópia de todo o objeto. Veja Objetos e Referencias
