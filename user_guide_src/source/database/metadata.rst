#################
Database Metadata
#################

.. contents::
    :local:
    :depth: 2

**************
Table MetaData
**************

These functions let you fetch table information.

List the Tables in Your Database
================================

**$db->listTables();**

Returns an array containing the names of all the tables in the database
you are currently connected to. Example:

.. literalinclude:: metadata/001.php
   :lines: 2-

.. note:: Some drivers have additional system tables that are excluded from this return.

Determine If a Table Exists
===========================

**$db->tableExists();**

Sometimes it's helpful to know whether a particular table exists before
running an operation on it. Returns a boolean true/false. Usage example:

.. literalinclude:: metadata/002.php
   :lines: 2-

.. note:: Replace *table_name* with the name of the table you are looking for.

**************
Field MetaData
**************

List the Fields in a Table
==========================

**$db->getFieldNames()**

Returns an array containing the field names. This query can be called
two ways:

1. You can supply the table name and call it from the ``$db->object``:

   .. literalinclude:: metadata/003.php
       :lines: 2-

2. You can gather the field names associated with any query you run by
calling the function from your query result object:

.. literalinclude:: metadata/004.php
    :lines: 2-

Determine If a Field is Present in a Table
==========================================

**$db->fieldExists()**

Sometimes it's helpful to know whether a particular field exists before
performing an action. Returns a boolean true/false. Usage example:

.. literalinclude:: metadata/005.php
   :lines: 2-

.. note:: Replace *field_name* with the name of the column you are looking
    for, and replace *table_name* with the name of the table you are
    looking for.

Retrieve Field Metadata
=======================

**$db->getFieldData()**

Returns an array of objects containing field information.

Sometimes it's helpful to gather the field names or other metadata, like
the column type, max length, etc.

.. note:: Not all databases provide meta-data.

Usage example:

.. literalinclude:: metadata/006.php
   :lines: 2-

If you have run a query already you can use the result object instead of
supplying the table name:

.. literalinclude:: metadata/007.php
   :lines: 2-

The following data is available from this function if supported by your
database:

-  name - column name
-  max_length - maximum length of the column
-  primary_key - 1 if the column is a primary key
-  type - the type of the column

List the Indexes in a Table
===========================

**$db->getIndexData()**

Returns an array of objects containing index information.

Usage example:

.. literalinclude:: metadata/008.php
   :lines: 2-

The key types may be unique to the database you are using.
For instance, MySQL will return one of primary, fulltext, spatial, index or unique
for each key associated with a table.

**$db->getForeignKeyData()**

Returns an array of objects containing foreign key information.

Usage example:

.. literalinclude:: metadata/009.php
   :lines: 2-

The object fields may be unique to the database you are using. For instance, SQLite3 does
not return data on column names, but has the additional *sequence* field for compound
foreign key definitions.
