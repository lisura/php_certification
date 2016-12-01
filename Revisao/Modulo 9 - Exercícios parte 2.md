# Questões

**1 - Your PHP application sends an email with data provided by the user, using PHP's mail() function. How can an attacker inject a custom BCC header to that email?**

A) Adding "\rBcc: email@example.com" to the subject

B) Adding "\nBcc: email@example.com" to the mail body

C) Adding "\r\nBcc: email@example.com" to the sender's address

D) None of the above

---

**2 - What is the safest way to transport a password entered in a web form to the server?**

A) Use JavaScript to hash the value, then send it to the server

B) Use JavaScript to encrypt the value, then send it to the server

C) Use an HTTPS connection to the server

D) Use HTTP-only cookies

---

**3 - Which function is used to get a specific external variable by name and optionally filter it?**

A) filter_output()

B) filter_name()

C) filter_input()

D) filter()

---

**4 - Which of the following is a PHP script vulnerability of the mail() function that can occur in Internet applications that are used to send email messages?**

A) Email scheduler

B) Email Bomber

C) SQL injection

D) Email injection

---

**5 - Which hash types does crypt() support? Each correct answer represents a complete solution. Choose all that apply.**

A) CRYPT_STD_EXS

B) CRYPT_STD_DES

C) CRYPT_SHA

D) CRYPT_STD_FISH

E) CRYPT_MD5_DES

F) CRYPT_EXT_DES

G) CRYPT_M5

H) CRYPT_DES

I) CRYPT_MD5

J) CRYPT_BLOWFISH

K) CRYPT_SHA128

L) CRYPT_SHA256

M) CRYPT_SHA512

---

**6 - Consider a scenario in which a website allows users to upload pictures. What kind of security should be set to prevent attacks?**

A) Allow upload of all files.

B) Limit the size to upload files.

C) Ensure validation for file extension.

D) Disallow execution of any file.

----

**7 - In addition to SQL Injection, a connection to a database is subject to other types of attacks. What kind of security should be set to prevent attacks?**

A) Limit access to the DB server only to servers that need access.

B) Implement all business logic in the web application.

C) Delete logs periodically.

D) Require a password change periodically.

----

**8 - What is the name of the library that PHP uses to support the SSL protocol?**

----

**9 - What is the name of the module that PHP uses to provide access to resources (shell, remote exec, tunneling, file transfer) on a remote machine using a secure cryptographic transport?**

----

----

# Respostas

1 - D. Deve se usar o \n , portanto A e C estão erradas. B está errada pois a informação deve ser inserida no campo sender

2 - C

3 - C. A e B não existem. D é incorreta pois filter() é uma extensão.

4 - D

5 - B,F,I,J,L,M

6 - B,C,D

7 - A,D

8 - OpenSSL

9 - Secure Shell2 ou SSH2 . SSH2 é uma extensão PHP para lidar com o protocolo SSH.
