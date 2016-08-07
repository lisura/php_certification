# Funções de operação de arquivo

## Diretórios

* **chdir** — Muda o diretório
* **chroot** — Muda o diretório raiz (root)
  >**Notas**: Esta função somente está disponível se seu sistema suportá-la e se você estiver utilizando o modo CLI, CGI ou SAPI Embutida. Também, esta função requer privilégio root.
  E não é implementada na plataforma Windows

* **closedir** — Fecha o manipulador do diretório
* **dir** — Retorna uma instância da classe Diretório
* **dirname** — Retorna o caminho/path do diretório pai
* **disk_free_space** — Retorna o espaço disponível no diretório
* **disk_total_space** — Retorna o tamanho total do diretório
* **disk_free_space** sinônimo de **diskfreespace** — Retorna o espaço disponível no diretório
* **is_dir** — Diz se o caminho é um diretório
* **mkdir** — Cria um diretório

### Arquivo de Informação

*


### Arquivo de Sistema

* **rename** — Renomeia um arquivo ou diretório. Também pode ser usado para mover:  
  ````php
  <?php
  rename("/tmp/tmp_file.txt", "/home/user/login/docs/my_file.txt");
  ````
