# Version 7.0.0 (sem bug fixes)

## 03 Dec 2015

### Core:
* Added zend_internal_function.reserved[] fields.
* Improved zend_string API.
* Improved __call() and __callStatic() magic method handling. Now they are called in a stackless way using ZEND_CALL_TRAMPOLINE opcode, without additional stack frame.
* Optimized strings concatenation.
* Fixed weird operators behavior. Division by zero now emits warning and returns +/-INF, modulo by zero and intdid() throws an exception, shifts by negative offset throw exceptions. Compile-time evaluation of division by zero is disabled.
* Added PHP_INT_MIN constant.
* Added Closure::call() method.
* Implemented the RFC `Catchable "Call to a member function bar() on a non-object"`.
* Added options parameter for unserialize allowing to specify acceptable classes (https://wiki.php.net/rfc/secure_unserialize).
* Removed ZEND_ACC_FINAL_CLASS, promoting ZEND_ACC_FINAL as final class modifier.
* is_long() & is_integer() is now an alias of is_int().
* Implemented FR #55467 (phpinfo: PHP Variables with $ and single quotes).
* Added ?? operator.
* Added <=> operator.
* Added \u{xxxxx} Unicode Codepoint Escape Syntax.
* Fixed oversight where define() did not support arrays yet const syntax did.
* Use "integer" and "float" instead of "long" and "double" in ZPP, type hint and conversion error messages.
* Implemented FR #55428 (E_RECOVERABLE_ERROR when output buffering in output buffering handler).
* Removed scoped calls of non-static methods from an incompatible $this context.
* Removed support for #-style comments in ini files.
* Removed support for assigning the result of new by reference.
* Invalid octal literals in source code now produce compile errors, fixes PHPSadness #31.
* Removed dl() function on fpm-fcgi.
* Removed support for hexadecimal numeric strings.
* Removed obsolete extensions and SAPIs. See the full list in UPGRADING.
* Added NULL byte protection to exec, system and passthru.
* Added error_clear_last() function.
* Improved zend_qsort(using hybrid sorting algo) for better performance, and also renamed zend_qsort to zend_sort.
* Added stable sorting algo zend_insert_sort.
* Improved zend_memnchr(using sunday algo) for better performance.
* Implemented the RFC `Scalar Type Decalarations v0.5`.
* Implemented the RFC `Group Use Declarations`.
* Implemented the RFC `Continue Output Buffering`.
* Implemented the RFC `Constructor behaviour of internal classes`.
* Implemented the RFC `Fix "foreach" behavior`.
* Implemented the RFC `Generator Delegation`.
* Implemented the RFC `Anonymous Class Support`.
* Implemented the RFC `Context Sensitive Lexer`.

### CLI server:
* Refactor MIME type handling to use a hash table instead of linear search.
* Update the MIME type list from the one shipped by Apache HTTPD.
* Added support for SEARCH WebDav method.

### Curl:
* Removed support for unsafe file uploads.

### Date:
* Fixed day_of_week function as it could sometimes return negative values internally.
* Removed $is_dst parameter from mktime() and gmmktime().
* Removed date.timezone warning (https://wiki.php.net/rfc/date.timezone_warning_removal).
* Added "v" DateTime format modifier to get the 3-digit version of fraction of seconds.
* Implemented FR #69089 (Added DateTime::RFC3339_EXTENDED to output in RFC3339 Extended format which includes fraction of seconds).

### DOM:
* Made DOMNode::textContent writeable.

### Filter:
* New FILTER_VALIDATE_DOMAIN and better RFC conformance for FILTER_VALIDATE_URL.

### FPM:
* Implemented FR #67106 (Split main fpm config).

### GD:
* Replace libvpx with libwebp for bundled libgd.
* Made fontFetch's path parser thread-safe.
* Removed T1Lib support.

### Intl:
* Removed deprecated aliases datefmt_set_timezone_id() and IntlDateFormatter::setTimeZoneID().

### JSON:
* Replace non-free JSON parser with a parser from Jsond extension, fixes #63520 (JSON extension includes a problematic license statement).

### LiteSpeed:
* Updated LiteSpeed SAPI code from V5.5 to V6.6.

### libxml:
* Fixed handling of big lines in error messages with libxml >= 2.9.0.

### Mcrypt:
* Fixed possible read after end of buffer and use after free.
* Removed mcrypt_generic_end() alias.
* Removed mcrypt_ecb(), mcrypt_cbc(), mcrypt_cfb(), mcrypt_ofb().

### OCI8:
* Fixed memory leak with LOBs.
* Corrected oci8 hash destructors to prevent segfaults, and a few other fixes.

### Opcache:
* Fixed compatibility with Windows 10 (see also bug #70652).
* Attmpt to fix "Unable to reattach to base address" problem.
* Removed opcache.load_comments configuration directive. Now doc comments loading costs nothing and always enabled.
* Added experimental (disabled by default) file based opcode cache.

### OpenSSL:
* Require at least OpenSSL version 0.9.8.
* Implemented FR #70438 (Add IV parameter for openssl_seal and openssl_open).
* Added "alpn_protocols" SSL context option allowing encrypted client/server streams to negotiate alternative protocols using the ALPN TLS extension when built against OpenSSL 1.0.2 or newer. Negotiated protocol information is accessible through stream_get_meta_data() output.
* Removed "CN_match" and "SNI_server_name" SSL context options. Use automatic detection or the "peer_name" option instead.

### Pcntl:
* Implemented FR #68505 (Added wifcontinued and wcontinued).
* Added rusage support to pcntl_wait() and pcntl_waitpid().

### PCRE:
* Removed support for the /e (PREG_REPLACE_EVAL) modifier.

### PDO_pgsql:
* Removed PGSQL_ATTR_DISABLE_NATIVE_PREPARED_STATEMENT attribute in favor of ATTR_EMULATE_PREPARES).

### Reflection:
* Fixed inheritance chain of Reflector interface.
* Added ReflectionGenerator class.
* Added reflection support for return types and type declarations.

### SPL:
* Changed ArrayIterator implementation using zend_hash_iterator_... API. Allowed modification of iterated ArrayObject using the same behavior as proposed in `Fix "foreach" behavior`. Removed "Array was modified outside object and internal position is no longer valid" hack.
* Implemented FR #67886 (SplPriorityQueue/SplHeap doesn't expose extractFlags nor curruption state).

### Standard:
* Fixed count on symbol tables.
* Implemented the RFC `Random Functions Throwing Exceptions in PHP 7`.
* Implemented FR #70112 (Allow "dirname" to go up various times).
* Removed call_user_method() and call_user_method_array() functions.
* Fixed user session handlers (See rfc:session.user.return-value).
* Added intdiv() function.
* Improved precision of log() function for base 2 and 10.
* Remove string category support in setlocale().
* Remove set_magic_quotes_runtime() and its alias magic_quotes_runtime().
* Added preg_replace_callback_array function.
* Deprecated salt option to password_hash.
* Added Windows support for getrusage().
* Removed hardcoded limit on number of pipes in proc_open().

### Streams:
* Removed set_socket_blocking() in favor of its alias stream_set_blocking().

### XSL:
* Removed xsl.security_prefs ini option.

### Zlib:
* Added deflate_init(), deflate_add(), inflate_init(), inflate_add() functions allowing incremental/streaming compression/decompression.

### Zip:
* Added ZipArchive::setCompressionName and ZipArchive::setCompressionIndex methods.
* Update bundled libzip to 1.0.1.
