################
HTML Table Class
################

The Table Class provides methods that enable you to auto-generate HTML
tables from arrays or database result sets.

.. contents::
    :local:
    :depth: 2

*********************
Using the Table Class
*********************

Initializing the Class
======================

The Table class is not provided as a service, and should be instantiated
"normally", for instance:

.. literalinclude:: table/001.php
   :lines: 2-

Examples
========

Here is an example showing how you can create a table from a
multi-dimensional array. Note that the first array index will become the
table heading (or you can set your own headings using the ``setHeading()``
method described in the function reference below).

.. literalinclude:: table/002.php
   :lines: 2-

Here is an example of a table created from a database query result. The
table class will automatically generate the headings based on the table
names (or you can set your own headings using the ``setHeading()``
method described in the class reference below).

.. literalinclude:: table/003.php
   :lines: 2-

Here is an example showing how you might create a table using discrete
parameters:

.. literalinclude:: table/004.php
   :lines: 2-

Here is the same example, except instead of individual parameters,
arrays are used:

.. literalinclude:: table/005.php
   :lines: 2-

Changing the Look of Your Table
===============================

The Table Class permits you to set a table template with which you can
specify the design of your layout. Here is the template prototype:

.. literalinclude:: table/006.php
   :lines: 2-

.. note:: You'll notice there are two sets of "row" blocks in the
    template. These permit you to create alternating row colors or design
    elements that alternate with each iteration of the row data.

You are NOT required to submit a complete template. If you only need to
change parts of the layout you can simply submit those elements. In this
example, only the table opening tag is being changed:

.. literalinclude:: table/007.php
   :lines: 2-

You can also set defaults for these by passing an array of template settings
to the Table constructor.:

.. literalinclude:: table/008.php
   :lines: 2-

***************
Class Reference
***************

.. php:class:: Table

    .. attribute:: $function = null

        Allows you to specify a native PHP function or a valid function array object to be applied to all cell data.

        .. literalinclude:: table/009.php
           :lines: 2-

        In the above example, all cell data would be run through PHP's :php:func:`htmlspecialchars()` function, resulting in::

            <td>Fred</td><td>&lt;strong&gt;Blue&lt;/strong&gt;</td><td>Small</td>

    .. php:method:: generate([$tableData = null])

        :param    mixed    $tableData: Data to populate the table rows with
        :returns:    HTML table
        :rtype:    string

        Returns a string containing the generated table. Accepts an optional parameter which can be an array or a database result object.

    .. php:method:: setCaption($caption)

        :param    string    $caption: Table caption
        :returns:    Table instance (method chaining)
        :rtype:    Table

        Permits you to add a caption to the table.

        .. literalinclude:: table/010.php
           :lines: 2-

    .. php:method:: setHeading([$args = [] [, ...]])

        :param    mixed    $args: An array or multiple strings containing the table column titles
        :returns:    Table instance (method chaining)
        :rtype:    Table

        Permits you to set the table heading. You can submit an array or discrete params:

        .. literalinclude:: table/011.php
           :lines: 2-

    .. php:method:: setFooting([$args = [] [, ...]])

        :param    mixed    $args: An array or multiple strings containing the table footing values
        :returns:    Table instance (method chaining)
        :rtype:    Table

        Permits you to set the table footing. You can submit an array or discrete params:

        .. literalinclude:: table/012.php
           :lines: 2-

    .. php:method:: addRow([$args = [] [, ...]])

        :param    mixed    $args: An array or multiple strings containing the row values
        :returns:    Table instance (method chaining)
        :rtype:    Table

        Permits you to add a row to your table. You can submit an array or discrete params:

        .. literalinclude:: table/013.php
           :lines: 2-

        If you would like to set an individual cell's tag attributes, you can use an associative array for that cell.
        The associative key **data** defines the cell's data. Any other key => val pairs are added as key='val' attributes to the tag:

        .. literalinclude:: table/014.php
           :lines: 2-

    .. php:method:: makeColumns([$array = [] [, $columnLimit = 0]])

        :param    array    $array: An array containing multiple rows' data
        :param    int    $columnLimit: Count of columns in the table
        :returns:    An array of HTML table columns
        :rtype:    array

        This method takes a one-dimensional array as input and creates a multi-dimensional array with a depth equal to the number of columns desired.
        This allows a single array with many elements to be displayed in a table that has a fixed column count. Consider this example:

        .. literalinclude:: table/015.php
           :lines: 2-

    .. php:method:: setTemplate($template)

        :param    array    $template: An associative array containing template values
        :returns:    true on success, false on failure
        :rtype:    bool

        Permits you to set your template. You can submit a full or partial template.

        .. literalinclude:: table/016.php
           :lines: 2-

    .. php:method:: setEmpty($value)

        :param    mixed    $value: Value to put in empty cells
        :returns:    Table instance (method chaining)
        :rtype:    Table

        Lets you set a default value for use in any table cells that are empty.
        You might, for example, set a non-breaking space:

        .. literalinclude:: table/017.php
           :lines: 2-

    .. php:method:: clear()

        :returns:    Table instance (method chaining)
        :rtype:    Table

        Lets you clear the table heading, row data and caption. If
        you need to show multiple tables with different data you
        should to call this method after each table has been
        generated to clear the previous table information.

        Example

        .. literalinclude:: table/018.php
           :lines: 2-
