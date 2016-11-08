# Questões

## 1) Which of the following file permissions is set by the tempnam() function for the newly created temp file?

A) 0700
B) 0600
C) 0777
D) 0666

---

## 2) Which of the following functions can be used to get whether or not a file is readable?

A) stat()
B) touch()
C) is_readable()
D) fseek()

---

## 3) Fill in the blank with the appropriate function().
The \_\_\_\_\_\_\_ function is used to copy data from one stream to another. It is mainly useful in copying data between two open files.
> Matching is case-insensitive.

A) stream_copy_to_stream()
B) stream_copy_stream()
C) copy_to_stream()

---

## 4) What will be the output of following PHP script:

```php
<?php
$a = gethostbyaddr($_SERVER['REMOTE_ADDR']);
echo $a;
?>
```

A) It will print the DNS resource records associated with the local Web server.
B) It will print the list of header information sent.
C) It will print the host name of the Internet host.
D) It will print the standard host name for the local Web server.

---

## 5) Consider the following PHP script:

```php
<?php
$fp = fopen('file.txt', 'r');
$string1 = fgets($fp, 512);
fseek($fp, 0);
```
## Which of the following functions will give the same output as that given by the fseek() function in the above script?

A) rewind()
B) fgets()
C) fgetss()
D) file()

---

## 6) What does the second parameter of the file_get_contents() function do?

A) It indicates the number of bytes to read.
B) It specifies the stream context.
C) It identifies the starting offset.
D) It indicates whether or not include_path should be used.

---

## 7) Which of the following PHP functions can be used to alter the amount of time PHP waits for a stream before timing out during reading or writing?

A) stream_set_meta_timeout()
B) stream_set_read_buffer()
C) stream_set_time()
D) stream_set_timeout()

---

## 8) Which of the following file functions can be used to indicate the current position of the file read/write pointer?

A) fread()
B) fseek()
C) ftell()
D) feof()

---

## 9) Which of the following functions will you use to read a file having single line irrespective of length?
> Each correct answer represents a complete solution. Choose two.

A) fgetss($fh)
B) fread($fh)
C) fgets($fh)
D) fgetc($fh)

## 10)  Which of the following code snippets write content from one file to another file? Each correct answer represents a complete solution.
> Choose all that apply.

A)
```php
<?php
$handle = fopen("target.txt","w+"); fwrite($handle,file_get_contents("source.txt")); fclose($handle);
```

B)
```php
<?php
stream_copy_to_stream("source.txt","target.txt");
```
C)
```php
<?php
$src = fopen('source.txt', 'r'); $dest = fopen('target.txt', 'w'); stream_copy_to_stream($src,$dest);
```

D)
```php
<?php
file_put_contents("target.txt",file_get_contents("source.txt"));
```


---
---

1) B

2) C

3) A

4) C

5) A

6) D

7) D

8) C

9) A & C

```
