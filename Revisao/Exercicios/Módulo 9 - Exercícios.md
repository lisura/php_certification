# Questões

1 - What configuration should you leave on your code for "error_reporting" in production?

a) E_ALL & ~E_DEPRECTED & ~E_STRICT

b) E_ALL & ~E_NOTICE

c) E_STRICT

d) OFF
___
2 - What is the possible vulnerability we can attack by inspecting client-side code?

A) Cross-Site Scripting (XSS)

B) Cross-Site Request Forgeries (CSRF)

C) Generate an error message

D) None of the above

___
3 - Which function does not provide protection from Remote Code Injection?

a) escapeshellcmd()

b) escapeshellarg()

c) htmlspecialchars()

d) strip_tags()

___
4 - Session fixation - a commonly used session-based attack - can be avoided simply by giving the user a new ID. What PHP function is used to change the ID for an active session?

a) session_reset

b) session_create_id

c) session_regenerate_id

d) session_create_new_id

e) session_id

f) session_generate_id
___
5 - You want to stop showing PHP errors so that a malicious hacker does not get information from your site. Which of the following PHP definitions will you use to accomplish this task? Select at least two.

a) display_errors = off

b) cgi.force_redirect

c) error_reporting = E_ALL | E_STRICT

d) log_errors = on
___
6 - How can you make it harder for JavaScript code to read out session IDs? (Choose 2)

A) Use the session_regenerate_id() function

B) Use the session_set_cookie_params() function

C) Use the session.cookie_httponly php.ini setting

D) Use the session.use_only_cookies php.ini setting
___
7 - Which of the following measures provides good protection against Cross-Site Request Forgery?

A) Relying on HTTP POST only

B) Relying on HTTP reference header

C) Relying on a one-time token

D) Relying on the user agent
___
8 - Which of the following data may be altered by the user and should be filtered

A) Query string data

B) HTTP referer

C) Browser identification string

D) All of the above
___
9 - Escaping output may help protect from which common security vulnerabilities? (Choose 2)

A) Clickjacking

B) Cross-Site Scripting

C) Cross-Ste Request Forgery

D) SQL Injection
___
10 - You are writing a PHP application that is used by thousands of people. You need to store database credentials in a secure fashion, but also want to make sure that the application can be easily deployed. What is
the best way to achieve that?

A) In a .txt file inside the web folder

B) In an .inc file inside the web folder

C) In a .php file inside the web folder

D) In a .php file outside the web folder
___
___
___
RESPOSTAS
___
___
___

1 - A
___
___

2 - A
___
___

3 - D  
escapeshellcmd — Escapa metacaracteres shell  
escapeshellarg — Escapa uma string para usar como um argumento shell  
htmlspecialchars — Converte caracteres especiais para a realidade HTML  
strip_tags — Retira as tags HTML e PHP de uma string  
___
___

4 - C  
session_regenerate_id() substituirá o id da seção atual com um novo id e manter a informação da sessão atual.

Quando session.use_trans_sid estiver habilitada, saídas (output) devem ser iniciadas depois de session_regenerate_id() ser chamada. Caso contrário, o ID da sessão antiga é utilizado.
___
___

5 - A e D
___
___

6 -   
B: Use the session_set_cookie_params() function  
C: Use the session.cookie_httponly php.ini setting  
___
___

7 - C: Relying on a one-time token
___
___

8 - D: All of the above
___
___

9 -  
B: Cross-Site Scripting (XSS)  
D: SQL Injection  
___
___

10 - C: In a .php file inside the web folder
___
___
