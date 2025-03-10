############
Transactions
############

CodeIgniter's database abstraction allows you to use transactions with
databases that support transaction-safe table types. In MySQL, you'll
need to be running InnoDB or BDB table types rather than the more common
MyISAM. Most other database platforms support transactions natively.

If you are not familiar with transactions we recommend you find a good
online resource to learn about them for your particular database. The
information below assumes you have a basic understanding of
transactions.

.. contents::
    :local:
    :depth: 2

CodeIgniter's Approach to Transactions
======================================

CodeIgniter utilizes an approach to transactions that is very similar to
the process used by the popular database class ADODB. We've chosen that
approach because it greatly simplifies the process of running
transactions. In most cases, all that is required is two lines of code.

Traditionally, transactions have required a fair amount of work to
implement since they demand that you keep track of your queries and
determine whether to commit or rollback based on the success or failure
of your queries. This is particularly cumbersome with nested queries. In
contrast, we've implemented a smart transaction system that does all
this for you automatically (you can also manage your transactions
manually if you choose to, but there's really no benefit).

Running Transactions
====================

To run your queries using transactions you will use the
``$this->db->transStart()`` and ``$this->db->transComplete()`` functions as
follows:

.. literalinclude:: transactions/001.php
   :lines: 2-

You can run as many queries as you want between the start/complete
functions and they will all be committed or rolled back based on the success
or failure of any given query.

Strict Mode
===========

By default, CodeIgniter runs all transactions in Strict Mode. When strict
mode is enabled, if you are running multiple groups of transactions, if
one group fails all groups will be rolled back. If strict mode is
disabled, each group is treated independently, meaning a failure of one
group will not affect any others.

Strict Mode can be disabled as follows:

.. literalinclude:: transactions/002.php
   :lines: 2-

Managing Errors
===============

If you have error reporting enabled in your Config/Database.php file
you'll see a standard error message if the commit was unsuccessful. If
debugging is turned off, you can manage your own errors like this:

.. literalinclude:: transactions/003.php
   :lines: 2-

Disabling Transactions
======================

Transactions are enabled by default. If you would like to disable transactions you
can do so using ``$this->db->transOff()``:

.. literalinclude:: transactions/004.php
   :lines: 2-

When transactions are disabled, your queries will be auto-committed, just
as they are when running queries without transactions.

Test Mode
=========

You can optionally put the transaction system into "test mode", which
will cause your queries to be rolled back -- even if the queries produce
a valid result. To use test mode simply set the first parameter in the
``$this->db->transStart()`` function to true:

.. literalinclude:: transactions/005.php
   :lines: 2-

Running Transactions Manually
=============================

If you would like to run transactions manually you can do so as follows:

.. literalinclude:: transactions/006.php
   :lines: 2-

.. note:: Make sure to use ``$this->db->transBegin()`` when running manual
    transactions, **NOT** ``$this->db->transStart()``.
