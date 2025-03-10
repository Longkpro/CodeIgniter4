############
Array Helper
############

The array helper provides several functions to simplify more complex usages of arrays. It is not intended to duplicate
any of the existing functionality that PHP provides - unless it is to vastly simplify their usage.

.. contents::
    :local:
    :depth: 2

Loading this Helper
===================

This helper is loaded using the following code:

.. literalinclude:: array_helper/001.php
   :lines: 2-

Available Functions
===================

The following functions are available:

..  php:function:: dot_array_search(string $search, array $values)

    :param  string  $search: The dot-notation string describing how to search the array
    :param  array   $values: The array to search
    :returns: The value found within the array, or null
    :rtype: mixed

    This method allows you to use dot-notation to search through an array for a specific-key,
    and allows the use of a the '*' wildcard. Given the following array:

    .. literalinclude:: array_helper/002.php
       :lines: 2-

    We can locate the value of 'fizz' by using the search string "foo.buzz.fizz". Likewise, the value
    of baz can be found with "foo.bar.baz":

    .. literalinclude:: array_helper/003.php
       :lines: 2-

    You can use the asterisk as a wildcard to replace any of the segments. When found, it will search through all
    of the child nodes until it finds it. This is handy if you don't know the values, or if your values
    have a numeric index:

    .. literalinclude:: array_helper/004.php
       :lines: 2-

    If the array key contains a dot, then the key can be escaped with a backslash:

    .. literalinclude:: array_helper/005.php
       :lines: 2-

..  php:function:: array_deep_search($key, array $array)

    :param  mixed  $key: The target key
    :param  array  $array: The array to search
    :returns: The value found within the array, or null
    :rtype: mixed

    Returns the value of an element with a key value in an array of uncertain depth

..  php:function:: array_sort_by_multiple_keys(array &$array, array $sortColumns)

    :param  array  $array:       The array to be sorted (passed by reference).
    :param  array  $sortColumns: The array keys to sort after and the respective PHP
                                 sort flags as an associative array.
    :returns: Whether sorting was successful or not.
    :rtype: bool

    This method sorts the elements of a multidimensional array by the values of one or
    more keys in a hierarchical way. Take the following array, that might be returned
    from, e.g., the ``find()`` function of a model:

    .. literalinclude:: array_helper/006.php
       :lines: 2-

    Now sort this array by two keys. Note that the method supports the dot-notation
    to access values in deeper array levels, but does not support wildcards:

    .. literalinclude:: array_helper/007.php
       :lines: 2-

    The ``$players`` array is now sorted by the 'order' value in each players'
    'team' subarray. If this value is equal for several players, these players
    will be ordered by their 'position'. The resulting array is:

    .. literalinclude:: array_helper/008.php
       :lines: 2-

    In the same way, the method can also handle an array of objects. In the example
    above it is further possible that each 'player' is represented by an array,
    while the 'teams' are objects. The method will detect the type of elements in
    each nesting level and handle it accordingly.

.. php:function:: array_flatten_with_dots(iterable $array[, string $id = '']): array

    :param iterable $array: The multidimensional array to flatten
    :param string $id: Optional ID to prepend to the outer keys. Used internally for flattening keys.
    :rtype: array
    :returns: The flattened array

    This function flattens a multidimensional array to a single key-value array by using dots
    as separators for the keys.

    .. literalinclude:: array_helper/009.php
       :lines: 2-

    On inspection, ``$flattened`` is equal to:

    .. literalinclude:: array_helper/010.php
       :lines: 2-

    Users may use the ``$id`` parameter on their own, but are not required to do so.
    The function uses this parameter internally to track the flattened keys. If users
    will be supplying an initial ``$id``, it will be prepended to all keys.

    .. literalinclude:: array_helper/011.php
       :lines: 2-
