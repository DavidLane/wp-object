wp-object
=========

Originally created to let me extend standard WordPress functionality.

WordPress lacked any sort of Class-based structure in templates and struggled with huge amounts of proceedural code, especially when it came to using plugins such as ACF. Wrapping the standard Post inside a class lets you add further calls to other functionality and deliver it as an easy to use bundle.

The general structure of WP themes using this is as follows:

my-theme/
  models/
    my-first-model.php
    my-second-model.php
    WPObject.php
  functions.php --> include models/* in here