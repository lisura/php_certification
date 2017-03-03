# Questões

**1 - Which HTTP status code asks a user to provide credentials?**

A) 404

B) 204

C) 401

D) 200

E) 302

----

**2 - What does status code 403 indicate?**

A) Forbidden

B) Resource not found

C) Not modified

D) 403 is not a valid status code

E) Moved permanently

----

**3 - With a single existing cookie set for this domain with the key "theme" and the value "green", what does the following code output?**
```php
<?php
print_r($_COOKIE);
setcookie('theme', NULL, time() - 3600);
print_r($_COOKIE);
unset($_COOKIE);
print_r($_COOKIE);
```

A) an error

B) Array ( [theme] => green )

C) Array ( [theme] => green ) Array ( [theme] => green )

D) Array ( [theme] => green ) Array ( [theme] => green ) Array ( [theme] => green )

E) nothing

----

**4 - What would you expect $_REQUEST to contain, with configuration settings as follows:**
```php
track_vars=1
request_order="GP"
variables_order="ESGPC"
```

A) POST variables, overwritten by GET variables

B) GET variables, overwritten by POST variables, COOKIE variables and SESSION variables, in that order

C) COOKIE variables, overwritten by POST variables, GET variables, SESSION variables and ENV variables, in that order

D) ENV variables, overwritten by SESSION variables, GET variables, POST variables and COOKIE variables, on that order

E) GET variables, overwritten by POST variables

----

**5 - What is the name of the key for the element in $_FILES['name'] that contains the provisional name of the uploaded file?**

----

**6 - What is the default timeout of a PHP session cookie?**

A) Depends on the web server

B) 10 minutes

C) 20 minutes

D) Until the browser is closed

----

**7 - If a form's action attribute is set to an empty string, where is data usually sent to?**

A) /

B) the current URI

C) index.php

D) the default page of the current directory

----

**8 - Which class of HTTP status codes is used for error conditions in server?**

A) 1XX

B) 3XX

C) 5XX

D) 2XX

E) 4XX

---

**9 - Which function we use to check if any HTTP Header were already sent?**

A) 200_response

B) headers_sent

C) header_sent

D) is_headersent

E) header_status_code

----

**10 - What is the output of the following code after we load the page 3 times?**
```php
<?php
session_start();

if (!array_key_exists('counter', $_SESSION)) {
  $_SESSION['counter'] = 0;
}else {
  $_SESSION['counter']++;
}

session_regenerate_id();
echo $_SESSION['counter'];
?>
```

----
# Respostas

1 - C (The 401 status code means "Not Authorised", so the user will be asked to identify themselves.)

2 - A (Status code 403 means "Forbidden" – the user has provided credentials but still is not allowed to have acecss to this resource.)

3 - C (Here we see the contents of the $_COOKIE array, but setting another cookie will not make any difference until the next request. The contents of $_COOKIE are output again, then we unset the array. We haven't destroyed any of the cookies being exchanged, but we have removed them from that variable in our script. So we don't see the output (butthere would be a notice if they were enabled).

4 - E (Don't be distracted by the other settings - the only one that matters here is request_order.)

5 - tmp_name

6 - D

7 - B

8 - C

9 - C

10 - 2
