# Performance  

Existem duas áreas principais que afetam a performance: uso de memória e delay de tempo de execução.  

## Garbage Collection  
Todas as variáveis do PHP são armazenadas em um recipiente chamado zval. O zval possui um contador interno que marca o uso das referências as variáveis armazenadas. Um garbage cycle verifica se pode diminuir o contador e, quando chega a zero, o recurso é liberado.  
Para melhorar a performance, os zval são colocados em um "root buffer", onde o algorítimo garante que eles sejam colocados apenas uma única vez. Apenas quando o buffer fica lotado, o ciclo é disparado.  

É possível forçar a execução de um ciclo, mesmo se o buffer não estiver lotado utilizando a função gc_collect_cycles() .  

O garbage collection tenta resolver o problema de memória, mas pode causar problemas de performance.  

## OPcache  
OPcache melhora o desempenho do PHP, armazenando scripts pré-compilados na memória compartilhada, eliminando assim a necessidade de PHP para carregar e analisar scripts a cada solicitação.

O OPcache já vem com o PHP5.5, mas precisa ser habilitado para funcionar.
