## 20 Jun 2013
* Drop support for bison < 2.4 when building PHP from GIT source

### Improved Zend Engine:
* Added ARMv7/v8 versions of various Zend arithmetic functions that are implemented using inline assembler
* Added systemtap support by enabling systemtap compatible dtrace probes on linux
* Optimized access to temporary and compiled VM variables. 8% less memory reads
* The VM stacks for passing function arguments and syntaticaly nested calls were merged into a single stack. The stack size needed for op_array execution is calculated at compile time and preallocated at once. As result all the stack push operations don't require checks for stack overflow any more

### General improvements:
* Added generators and coroutines.
* Added "finally" keyword.
* Added simplified password hashing API.
* Added support for constant array/string dereferencing.
* Added Class Name Resolution As Scalar Via "class" Keyword
* Added support for using empty() on the result of function calls and other expressions
* Added support for non-scalar Iterator keys in foreach
* Added support for list in foreach

### Core:
* Added Zend Opcache extension and enable building it by default.
* Added array_column function which returns a column in a multidimensional array
* Added boolval()
* Added "Z" option to pack/unpack
* Added optional second argument for assert() to specify custom message
* Added support for changing the process's title in CLI/CLI-Server SAPIs. The implementation is more robust that the proctitle PECL module
* Improve set_exception_handler while doing reset
* Return previous handler when passing NULL to set_error_handler and set_exception_handler
* Implemented FR #64175 (Added HTTP codes as of RFC 6585)
* Implemented FR #60738 (Allow 'set_error_handler' to handle NULL)
* Implemented FR #60524 (specify temp dir by php.ini)
* Implemented FR #46487 (Dereferencing process-handles no longer waits on those processes)
* Fix undefined behavior when converting double variables to integers. The double is now always rounded towards zero, the remainder of its division by 2^32 or 2^64 (depending on sizeof(long)) is calculated and it's made signed assuming a two's complement representation

### Removed legacy features:
* Remove php_logo_guid(), php_egg_logo_guid(), php_real_logo_guid(), zend_logo_guid()
* Drop Windows XP and 2003 support

### Apache2 Handler SAPI:
* Enabled Apache 2.4 configure option for Windows.

### Calendar:
* Fixed bug #64895 (Integer overflow in SndToJewish).
* Fixed bug #54254 (cal_from_jd returns month = 6 when there is only one Adar).

### CLI server:
* Fixed bug #64128 (buit-in web server is broken on ppc64).

### CURL:
* Remove curl stream wrappers.
* Implemented FR #46439 (added CURLFile for safer file uploads).
* Added support for CURLOPT_FTP_RESPONSE_TIMEOUT, CURLOPT_APPEND, CURLOPT_DIRLISTONLY, CURLOPT_NEW_DIRECTORY_PERMS, CURLOPT_NEW_FILE_PERMS, CURLOPT_NETRC_FILE, CURLOPT_PREQUOTE, CURLOPT_KRBLEVEL, CURLOPT_MAXFILESIZE, CURLOPT_FTP_ACCOUNT, CURLOPT_COOKIELIST, CURLOPT_IGNORE_CONTENT_LENGTH, CURLOPT_CONNECT_ONLY, CURLOPT_LOCALPORT, CURLOPT_LOCALPORTRANGE, CURLOPT_FTP_ALTERNATIVE_TO_USER, CURLOPT_SSL_SESSIONID_CACHE, CURLOPT_FTP_SSL_CCC, CURLOPT_HTTP_CONTENT_DECODING, CURLOPT_HTTP_TRANSFER_DECODING, CURLOPT_PROXY_TRANSFER_MODE, CURLOPT_ADDRESS_SCOPE, CURLOPT_CRLFILE, CURLOPT_ISSUERCERT, CURLOPT_USERNAME, CURLOPT_PASSWORD, CURLOPT_PROXYUSERNAME, CURLOPT_PROXYPASSWORD, CURLOPT_NOPROXY, CURLOPT_SOCKS5_GSSAPI_NEC, CURLOPT_SOCKS5_GSSAPI_SERVICE, CURLOPT_TFTP_BLKSIZE, CURLOPT_SSH_KNOWNHOSTS, CURLOPT_FTP_USE_PRET, CURLOPT_MAIL_FROM, CURLOPT_MAIL_RCPT, CURLOPT_RTSP_CLIENT_CSEQ, CURLOPT_RTSP_SERVER_CSEQ, CURLOPT_RTSP_SESSION_ID, CURLOPT_RTSP_STREAM_URI, CURLOPT_RTSP_TRANSPORT, CURLOPT_RTSP_REQUEST, CURLOPT_RESOLVE, CURLOPT_ACCEPT_ENCODING, CURLOPT_TRANSFER_ENCODING, CURLOPT_DNS_SERVERS and CURLOPT_USE_SSL
* Added new functions curl_escape, curl_multi_setopt, curl_multi_strerror curl_pause, curl_reset, curl_share_close, curl_share_init, curl_share_setopt curl_strerror and curl_unescape
* Added new curl options CURLOPT_TELNETOPTIONS, CURLOPT_GSSAPI_DELEGATION, CURLOPT_ACCEPTTIMEOUT_MS, CURLOPT_SSL_OPTIONS, CURLOPT_TCP_KEEPALIVE, CURLOPT_TCP_KEEPIDLE and CURLOPT_TCP_KEEPINTVL

### DateTime:
* Added DateTimeImmutable - a variant of DateTime that only returns the modified state instead of changing itself.

### Filter:
* Implemented FR #49180 (added MAC address validation)

### Fileinfo:
* Upgraded libmagic to 5.14.

### FPM:
* Add --with-fpm-systemd option to report health to systemd, and systemd_interval option to configure this. The service can now use Type=notify in the systemd unit file.
* Ignore QUERY_STRING when sent in SCRIPT_FILENAME
* Log a warning when a syscall fails
* Implemented FR #64764 (add support for FPM init.d script)

### GD:
* Fix build with system libgd >= 2.1 which is now the minimal version required (as build with previous version is broken). No change when bundled libgd is used
* Upgraded libgd to 2.1

### hash:
* Added support for PBKDF2 via hash_pbkdf2().

### intl:
* Added UConverter wrapper.
* The intl extension now requires ICU 4.0+
* Added intl.use_exceptions INI directive, which controls what happens when global errors are set together with intl.error_level
* MessageFormatter::format() and related functions now accepted named arguments and mixed numeric/named arguments in ICU 4.8+
* MessageFormatter::format() and related functions now don't error out when an insufficient argument count is provided. Instead, the placeholders will remain unsubstituted
* MessageFormatter::parse() and MessageFormat::format() (and their static equivalents) don't throw away better than second precision in the arguments
* IntlDateFormatter::__construct and datefmt_create() now accept for the $timezone argument time zone identifiers, IntlTimeZone objects, DateTimeZone objects and NULL
* IntlDateFormatter::__construct and datefmt_create() no longer accept invalid timezone identifiers or empty strings
* The default time zone used in IntlDateFormatter::__construct and datefmt_create() (when the corresponding argument is not passed or NULL is passed) is now the one given by date_default_timezone_get(), not the default ICU time zone
* The time zone passed to the IntlDateFormatter is ignored if it is NULL and if the calendar passed is an IntlCalendar object -- in this case, the IntlCalendar's time zone will be used instead. Otherwise, the time zone specified in the $timezone argument is used instead. This does not affect old code, as IntlCalendar was introduced in this version
* IntlDateFormatter::__construct and datefmt_create() now accept for the $calendar argument also IntlCalendar objects
* IntlDateFormatter::getCalendar() and datefmt_get_calendar() return false if the IntlDateFormatter was set up with an IntlCalendar instead of the constants IntlDateFormatter::GREGORIAN/TRADITIONAL. IntlCalendar did not exist before this version
* IntlDateFormatter::setCalendar() and datefmt_set_calendar() now also accept an IntlCalendar object, in which case its time zone is taken. Passing a constant is still allowed, and still keeps the time zone
* IntlDateFormatter::setTimeZoneID() and datefmt_set_timezone_id() are deprecated. Use IntlDateFormatter::setTimeZone() or datefmt_set_timezone() instead
* IntlDateFormatter::format() and datefmt_format() now also accept an IntlCalendar object for formatting
* Added the classes: IntlCalendar, IntlGregorianCalendar, IntlTimeZone, IntlBreakIterator, IntlRuleBasedBreakIterator and IntlCodePointBreakIterator
* Added the functions: intlcal_get_keyword_values_for_locale(), intlcal_get_now(), intlcal_get_available_locales(), intlcal_get(), intlcal_get_time(), intlcal_set_time(), intlcal_add(), intlcal_set_time_zone(), intlcal_after(), intlcal_before(), intlcal_set(), intlcal_roll(), intlcal_clear(), intlcal_field_difference(), intlcal_get_actual_maximum(), intlcal_get_actual_minimum(), intlcal_get_day_of_week_type(), intlcal_get_first_day_of_week(), intlcal_get_greatest_minimum(), intlcal_get_least_maximum(), intlcal_get_locale(), intlcal_get_maximum(), intlcal_get_minimal_days_in_first_week(), intlcal_get_minimum(), intlcal_get_time_zone(), intlcal_get_type(), intlcal_get_weekend_transition(), intlcal_in_daylight_time(), intlcal_is_equivalent_to(), intlcal_is_lenient(), intlcal_is_set(), intlcal_is_weekend(), intlcal_set_first_day_of_week(), intlcal_set_lenient(), intlcal_equals(), intlcal_get_repeated_wall_time_option(), intlcal_get_skipped_wall_time_option(), intlcal_set_repeated_wall_time_option(), intlcal_set_skipped_wall_time_option(), intlcal_from_date_time(), intlcal_to_date_time(), intlcal_get_error_code(), intlcal_get_error_message(), intlgregcal_create_instance(), intlgregcal_set_gregorian_change(), intlgregcal_get_gregorian_change() and intlgregcal_is_leap_year()
* Added the functions: intltz_create_time_zone(), intltz_create_default(), intltz_get_id(), intltz_get_gmt(), intltz_get_unknown(), intltz_create_enumeration(), intltz_count_equivalent_ids(), intltz_create_time_zone_id_enumeration(), intltz_get_canonical_id(), intltz_get_region(), intltz_get_tz_data_version(), intltz_get_equivalent_id(), intltz_use_daylight_time(), intltz_get_offset(), intltz_get_raw_offset(), intltz_has_same_rules(), intltz_get_display_name(), intltz_get_dst_savings(), intltz_from_date_time_zone(), intltz_to_date_time_zone(), intltz_get_error_code(), intltz_get_error_message()
* Added the methods: IntlDateFormatter::formatObject(), IntlDateFormatter::getCalendarObject(), IntlDateFormatter::getTimeZone(), IntlDateFormatter::setTimeZone()
* Added the functions: datefmt_format_object(), datefmt_get_calendar_object(), datefmt_get_timezone(), datefmt_set_timezone(), datefmt_get_calendar_object(), intlcal_create_instance()

### MCrypt:
* mcrypt_ecb(), mcrypt_cbc(), mcrypt_cfb() and mcrypt_ofb() now throw E_DEPRECATED.

### mysql:
* This extension is now deprecated, and deprecation warnings will be generated when connections are established to databases via mysql_connect(), mysql_pconnect(), or through implicit connection: use MySQLi or PDO_MySQL instead
* Dropped support for LOAD DATA LOCAL INFILE handlers when using libmysql. Known for stability problems
* Added support for SHA256 authentication available with MySQL 5.6.6+

### mysqli:
* Added mysqli_begin_transaction()/mysqli::begin_transaction(). Implemented all options, per MySQL 5.6, which can be used with START TRANSACTION, COMMIT and ROLLBACK through options to mysqli_commit()/mysqli_rollback() and their respective OO counterparts. They work in libmysql and mysqlnd mode
* Added mysqli_savepoint(), mysqli_release_savepoint()

### mysqlnd:
* Add new begin_transaction() call to the connection object. Implemented all options, per MySQL 5.6, which can be used with START TRANSACTION, COMMIT and ROLLBACK
* Added mysqlnd_savepoint(), mysqlnd_release_savepoint()
* Fixed return value of mysqli_stmt_affected_rows() in the time after prepare() and before execute()

### PCRE:
* Merged PCRE 8.32
* Deprecated the /e modifier

### pgsql:
* Added pg_escape_literal() and pg_escape_identifier()

### Phar:
* Fixed timestamp update on Phar contents modification

### Sockets:
* Added socket_cmsg_space(), socket_sendmsg(), and socket_recvmsg() functions

### SPL:
* Implement #48358 (Add SplDoublyLinkedList::add() to insert an element at a given offset)

### SOAP:
* Added SoapClient constructor option 'ssl_method' to specify ssl method

### Streams:
* Fixed Windows x64 version of stream_socket_pair() and improved error handling

### Zip:
* Upgraded libzip to 0.10.1
