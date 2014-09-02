<?php

/* PsPdfBundle:Example:markdown.pdf.twig */
class __TwigTemplate_bae3aa1d8c6f5c5e15a4cf5783f43c8bae5803c25f3c554ca38998787cec6901 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "PHP Markdown
============

Version 1.0.1m - Sat 21 Jun 2008

by Michel Fortin
<http://michelf.com/>

based on work by John Gruber  
<http://daringfireball.net/>


Introduction
------------

Markdown is a text-to-HTML conversion tool for web writers. Markdown
allows you to write using an easy-to-read, easy-to-write plain text
format, then convert it to structurally valid XHTML (or HTML).

\"Markdown\" is two things: a plain text markup syntax, and a software 
tool, written in Perl, that converts the plain text markup to HTML. 
PHP Markdown is a port to PHP of the original Markdown program by 
John Gruber.

PHP Markdown can work as a plug-in for WordPress and bBlog, as a 
modifier for the Smarty templating engine, or as a remplacement for
textile formatting in any software that support textile.

Full documentation of Markdown's syntax is available on John's 
Markdown page: <http://daringfireball.net/projects/markdown/>


Installation and Requirement
----------------------------

PHP Markdown requires PHP version 4.0.5 or later.


### WordPress ###

PHP Markdown works with [WordPress][wp], version 1.2 or later.

 [wp]: http://wordpress.org/

1.  To use PHP Markdown with WordPress, place the \"makrdown.php\" file 
    in the \"plugins\" folder. This folder is located inside 
    \"wp-content\" at the root of your site:

        (site home)/wp-content/plugins/

2.  Activate the plugin with the administrative interface of 
    WordPress. In the \"Plugins\" section you will now find Markdown. 
    To activate the plugin, click on the \"Activate\" button on the 
    same line than Markdown. Your entries will now be formatted by 
    PHP Markdown.

3.  To post Markdown content, you'll first have to disable the 
\t\"visual\" editor in the User section of WordPress.

You can configure PHP Markdown to not apply to the comments on your 
WordPress weblog. See the \"Configuration\" section below.

It is not possible at this time to apply a different set of 
filters to different entries. All your entries will be formated by 
PHP Markdown. This is a limitation of WordPress. If your old entries 
are written in HTML (as opposed to another formatting syntax, like 
Textile), they'll probably stay fine after installing Markdown.


### bBlog ###

PHP Markdown also works with [bBlog][bb].

 [bb]: http://www.bblog.com/

To use PHP Markdown with bBlog, rename \"markdown.php\" to 
\"modifier.markdown.php\" and place the file in the \"bBlog_plugins\" 
folder. This folder is located inside the \"bblog\" directory of 
your site, like this:

        (site home)/bblog/bBlog_plugins/modifier.markdown.php

Select \"Markdown\" as the \"Entry Modifier\" when you post a new 
entry. This setting will only apply to the entry you are editing.


### Replacing Textile in TextPattern ###

[TextPattern][tp] use [Textile][tx] to format your text. You can 
replace Textile by Markdown in TextPattern without having to change
any code by using the *Texitle Compatibility Mode*. This may work 
with other software that expect Textile too.

 [tx]: http://www.textism.com/tools/textile/
 [tp]: http://www.textpattern.com/

1.  Rename the \"markdown.php\" file to \"classTextile.php\". This will
\tmake PHP Markdown behave as if it was the actual Textile parser.

2.  Replace the \"classTextile.php\" file TextPattern installed in your
\tweb directory. It can be found in the \"lib\" directory:

\t\t(site home)/textpattern/lib/

Contrary to Textile, Markdown does not convert quotes to curly ones 
and does not convert multiple hyphens (`--` and `---`) into en- and 
em-dashes. If you use PHP Markdown in Textile Compatibility Mode, you 
can solve this problem by installing the \"smartypants.php\" file from 
[PHP SmartyPants][psp] beside the \"classTextile.php\" file. The Textile 
Compatibility Mode function will use SmartyPants automatically without 
further modification.

 [psp]: http://michelf.com/projects/php-smartypants/


### Updating Markdown in Other Programs ###

Many web applications now ship with PHP Markdown, or have plugins to 
perform the conversion to HTML. You can update PHP Markdown in many of 
these programs by swapping the old \"markdown.php\" file for the new one.

Here is a short non-exhaustive list of some programs and where they 
hide the \"markdown.php\" file.

| Program   | Path to Markdown
| -------   | ----------------
| [Pivot][] | `(site home)/pivot/includes/markdown/markdown.php`

If you're unsure if you can do this with your application, ask the 
developer, or wait for the developer to update his application or 
plugin with the new version of PHP Markdown.

 [Pivot]: http://pivotlog.net/


### In Your Own Programs ###

You can use PHP Markdown easily in your current PHP program. Simply 
include the file and then call the Markdown function on the text you 
want to convert:

    include_once \"markdown.php\";
    \$my_html = Markdown(\$my_text);

If you wish to use PHP Markdown with another text filter function 
built to parse HTML, you should filter the text *after* the Markdown
function call. This is an example with [PHP SmartyPants][psp]:

    \$my_html = SmartyPants(Markdown(\$my_text));


### With Smarty ###

If your program use the [Smarty][sm] template engine, PHP Markdown 
can now be used as a modifier for your templates. Rename \"markdown.php\" 
to \"modifier.markdown.php\" and put it in your smarty plugins folder.

  [sm]: http://smarty.php.net/

If you are using MovableType 3.1 or later, the Smarty plugin folder is 
located at `(MT CGI root)/php/extlib/smarty/plugins`. This will allow 
Markdown to work on dynamic pages.


Configuration
-------------

By default, PHP Markdown produces XHTML output for tags with empty 
elements. E.g.:

    <br />

Markdown can be configured to produce HTML-style tags; e.g.:

    <br>

To do this, you  must edit the \"MARKDOWN_EMPTY_ELEMENT_SUFFIX\" 
definition below the \"Global default settings\" header at the start of 
the \"markdown.php\" file.


### WordPress-Specific Settings ###

By default, the Markdown plugin applies to both posts and comments on 
your WordPress weblog. To deactivate one or the other, edit the 
`MARKDOWN_WP_POSTS` or `MARKDOWN_WP_COMMENTS` definitions under the 
\"WordPress settings\" header at the start of the \"markdown.php\" file.


Bugs
----

To file bug reports please send email to:
<michel.fortin@michelf.com>

Please include with your report: (1) the example input; (2) the output you
expected; (3) the output PHP Markdown actually produced.


Version History
---------------

1.0.1n (10 Oct 2009):

*\tEnabled reference-style shortcut links. Now you can write reference-style 
\tlinks with less brakets:
\t
\t\tThis is [my website].
\t\t
\t\t[my website]: http://example.com/
\t
\tThis was added in the 1.0.2 betas, but commented out in the 1.0.1 branch, 
\twaiting for the feature to be officialized. [But half of the other Markdown
\timplementations are supporting this syntax][half], so it makes sense for 
\tcompatibility's sake to allow it in PHP Markdown too.

 [half]: http://babelmark.bobtfish.net/?markdown=This+is+%5Bmy+website%5D.%0D%0A%09%09%0D%0A%5Bmy+website%5D%3A+http%3A%2F%2Fexample.com%2F%0D%0A&src=1&dest=2

*\tNow accepting many valid email addresses in autolinks that were 
\tpreviously rejected, such as:
\t
\t\t<abc+mailbox/department=shipping@example.com>
\t\t<!#\$%&'*+-/=?^_`.{|}~@example.com>
\t\t<\"abc@def\"@example.com>
\t\t<\"Fred Bloggs\"@example.com>
\t\t<jsmith@[192.0.2.1]>

*\tNow accepting spaces in URLs for inline and reference-style links. Such 
\tURLs need to be surrounded by angle brakets. For instance:
\t
\t\t[link text](<http://url/with space> \"optional title\")

\t\t[link text][ref]
\t\t[ref]: <http://url/with space> \"optional title\"
\t
\tThere is still a quirk which may prevent this from working correctly with 
\trelative URLs in inline-style links however.

*\tFix for adjacent list of different kind where the second list could
\tend as a sublist of the first when not separated by an empty line.

*\tFixed a bug where inline-style links wouldn't be recognized when the link 
\tdefinition contains a line break between the url and the title.

*\tFixed a bug where tags where the name contains an underscore aren't parsed 
\tcorrectly.

*\tFixed some corner-cases mixing underscore-ephasis and asterisk-emphasis.


1.0.1m (21 Jun 2008):

*\tLists can now have empty items.

*\tRewrote the emphasis and strong emphasis parser to fix some issues
\twith odly placed and overlong markers.


1.0.1l (11 May 2008):

*\tNow removing the UTF-8 BOM at the start of a document, if present.

*\tNow accepting capitalized URI schemes (such as HTTP:) in automatic
\tlinks, such as `<HTTP://EXAMPLE.COM/>`.

*\tFixed a problem where `<hr@example.com>` was seen as a horizontal
\trule instead of an automatic link.

*\tFixed an issue where some characters in Markdown-generated HTML
\tattributes weren't properly escaped with entities.

*\tFix for code blocks as first element of a list item. Previously,
\tthis didn't create any code block for item 2:
\t
\t\t*   Item 1 (regular paragraph)
\t\t
\t\t*       Item 2 (code block)

*\tA code block starting on the second line of a document wasn't seen
\tas a code block. This has been fixed.
\t
*\tAdded programatically-settable parser properties `predef_urls` and 
\t`predef_titles` for predefined URLs and titles for reference-style 
\tlinks. To use this, your PHP code must call the parser this way:
\t
\t\t\$parser = new Markdwon_Parser;
\t\t\$parser->predef_urls = array('linkref' => 'http://example.com');
\t\t\$html = \$parser->transform(\$text);
\t
\tYou can then use the URL as a normal link reference:
\t
\t\t[my link][linkref]\t
\t\t[my link][linkRef]
\t\t
\tReference names in the parser properties *must* be lowercase.
\tReference names in the Markdown source may have any case.

*\tAdded `setup` and `teardown` methods which can be used by subclassers
\tas hook points to arrange the state of some parser variables before and 
\tafter parsing.


1.0.1k (26 Sep 2007):

*\tFixed a problem introduced in 1.0.1i where three or more identical
\tuppercase letters, as well as a few other symbols, would trigger
\ta horizontal line.


1.0.1j (4 Sep 2007):

*\tFixed a problem introduced in 1.0.1i where the closing `code` and 
\t`pre` tags at the end of a code block were appearing in the wrong 
\torder.

*\tOverriding configuration settings by defining constants from an 
\texternal before markdown.php is included is now possible without 
\tproducing a PHP warning.


1.0.1i (31 Aug 2007):

*\tFixed a problem where an escaped backslash before a code span 
\twould prevent the code span from being created. This should now
\twork as expected:
\t
\t\tLitteral backslash: \\\\`code span`

*\tOverall speed improvements, especially with long documents.


1.0.1h (3 Aug 2007):

*\tAdded two properties (`no_markup` and `no_entities`) to the parser 
\tallowing HTML tags and entities to be disabled.

*\tFix for a problem introduced in 1.0.1g where posting comments in 
\tWordPress would trigger PHP warnings and cause some markup to be 
\tincorrectly filtered by the kses filter in WordPress.


1.0.1g (3 Jul 2007):

*\tFix for PHP 5 compiled without the mbstring module. Previous fix to 
\tcalculate the length of UTF-8 strings in `detab` when `mb_strlen` is 
\tnot available was only working with PHP 4.

*\tFixed a problem with WordPress 2.x where full-content posts in RSS feeds 
\twere not processed correctly by Markdown.

*\tNow supports URLs containing literal parentheses for inline links 
\tand images, such as:

\t\t[WIMP](http://en.wikipedia.org/wiki/WIMP_(computing))

\tSuch parentheses may be arbitrarily nested, but must be
\tbalanced. Unbalenced parentheses are allowed however when the URL 
\twhen escaped or when the URL is enclosed in angle brakets `<>`.

*\tFixed a performance problem where the regular expression for strong 
\temphasis introduced in version 1.0.1d could sometime be long to process, 
\tgive slightly wrong results, and in some circumstances could remove 
\tentirely the content for a whole paragraph.

*\tSome change in version 1.0.1d made possible the incorrect nesting of 
\tanchors within each other. This is now fixed.

*\tFixed a rare issue where certain MD5 hashes in the content could
\tbe changed to their corresponding text. For instance, this:

\t\tThe MD5 value for \"+\" is \"26b17225b626fb9238849fd60eabdf60\".
\t
\twas incorrectly changed to this in previous versions of PHP Markdown:

\t\t<p>The MD5 value for \"+\" is \"+\".</p>

*\tNow convert escaped characters to their numeric character 
\treferences equivalent.
\t
\tThis fix an integration issue with SmartyPants and backslash escapes. 
\tSince Markdown and SmartyPants have some escapable characters in common, 
\tit was sometime necessary to escape them twice. Previously, two 
\tbackslashes were sometime required to prevent Markdown from \"eating\" the 
\tbackslash before SmartyPants sees it:
\t
\t\tHere are two hyphens: \\\\--
\t
\tNow, only one backslash will do:
\t
\t\tHere are two hyphens: \\--


1.0.1f (7 Feb 2007):

*\tFixed an issue with WordPress where manually-entered excerpts, but 
\tnot the auto-generated ones, would contain nested paragraphs.

*\tFixed an issue introduced in 1.0.1d where headers and blockquotes 
\tpreceded too closely by a paragraph (not separated by a blank line) 
\twhere incorrectly put inside the paragraph.

*\tFixed an issue introduced in 1.0.1d in the tokenizeHTML method where 
\ttwo consecutive code spans would be merged into one when together they 
\tform a valid tag in a multiline paragraph.

*\tFixed an long-prevailing issue where blank lines in code blocks would 
\tbe doubled when the code block is in a list item.
\t
\tThis was due to the list processing functions relying on artificially 
\tdoubled blank lines to correctly determine when list items should 
\tcontain block-level content. The list item processing model was thus 
\tchanged to avoid the need for double blank lines.

*\tFixed an issue with `<% asp-style %>` instructions used as inline 
\tcontent where the opening `<` was encoded as `&lt;`.

*\tFixed a parse error occuring when PHP is configured to accept 
\tASP-style delimiters as boundaries for PHP scripts.

*\tFixed a bug introduced in 1.0.1d where underscores in automatic links
\tgot swapped with emphasis tags.


1.0.1e (28 Dec 2006)

*\tAdded support for internationalized domain names for email addresses in 
\tautomatic link. Improved the speed at which email addresses are converted 
\tto entities. Thanks to Milian Wolff for his optimisations.

*\tMade deterministic the conversion to entities of email addresses in 
\tautomatic links. This means that a given email address will always be 
\tencoded the same way.

*\tPHP Markdown will now use its own function to calculate the length of an 
\tUTF-8 string in `detab` when `mb_strlen` is not available instead of 
\tgiving a fatal error.


1.0.1d (1 Dec 2006)

*   Fixed a bug where inline images always had an empty title attribute. The 
\ttitle attribute is now present only when explicitly defined.

*\tLink references definitions can now have an empty title, previously if the 
\ttitle was defined but left empty the link definition was ignored. This can 
\tbe useful if you want an empty title attribute in images to hide the 
\ttooltip in Internet Explorer.

*\tMade `detab` aware of UTF-8 characters. UTF-8 multi-byte sequences are now 
\tcorrectly mapped to one character instead of the number of bytes.

*\tFixed a small bug with WordPress where WordPress' default filter `wpautop`
\twas not properly deactivated on comment text, resulting in hard line breaks
\twhere Markdown do not prescribes them.

*\tAdded a `TextileRestrited` method to the textile compatibility mode. There
\tis no restriction however, as Markdown does not have a restricted mode at 
\tthis point. This should make PHP Markdown work again in the latest 
\tversions of TextPattern.

*   Converted PHP Markdown to a object-oriented design.

*\tChanged span and block gamut methods so that they loop over a 
\tcustomizable list of methods. This makes subclassing the parser a more 
\tinteresting option for creating syntax extensions.

*\tAlso added a \"document\" gamut loop which can be used to hook document-level 
\tmethods (like for striping link definitions).

*\tChanged all methods which were inserting HTML code so that they now return 
\ta hashed representation of the code. New methods `hashSpan` and `hashBlock`
\tare used to hash respectivly span- and block-level generated content. This 
\thas a couple of significant effects:
\t
\t1.\tIt prevents invalid nesting of Markdown-generated elements which 
\t    could occur occuring with constructs like `*something [link*][1]`.
\t2.\tIt prevents problems occuring with deeply nested lists on which 
\t    paragraphs were ill-formed.
\t3.\tIt removes the need to call `hashHTMLBlocks` twice during the the 
\t\tblock gamut.
\t
\tHashes are turned back to HTML prior output.

*\tMade the block-level HTML parser smarter using a specially-crafted regular 
\texpression capable of handling nested tags.

*\tSolved backtick issues in tag attributes by rewriting the HTML tokenizer to 
\tbe aware of code spans. All these lines should work correctly now:
\t
\t\t<span attr='`ticks`'>bar</span>
\t\t<span attr='``double ticks``'>bar</span>
\t\t`<test a=\"` content of attribute `\">`

*\tChanged the parsing of HTML comments to match simply from `<!--` to `-->` 
\tinstead using of the more complicated SGML-style rule with paired `--`.
\tThis is how most browsers parse comments and how XML defines them too.

*\t`<address>` has been added to the list of block-level elements and is now
\ttreated as an HTML block instead of being wrapped within paragraph tags.

*\tNow only trim trailing newlines from code blocks, instead of trimming
\tall trailing whitespace characters.

*\tFixed bug where this:

\t\t[text](http://m.com \"title\" )
\t\t
\twasn't working as expected, because the parser wasn't allowing for spaces
\tbefore the closing paren.

*\tFilthy hack to support markdown='1' in div tags.

*\t_DoAutoLinks() now supports the 'dict://' URL scheme.

*\tPHP- and ASP-style processor instructions are now protected as
\traw HTML blocks.

\t\t<? ... ?>
\t\t<% ... %>

*\tFix for escaped backticks still triggering code spans:

\t\tThere are two raw backticks here: \\` and here: \\`, not a code span


1.0.1c (9 Dec 2005)

*   Fixed a problem occurring with PHP 5.1.1 due to a small
    change to strings variable replacement behaviour in
    this version.


1.0.1b (6 Jun 2005)

*\tFixed a bug where an inline image followed by a reference link would
\tgive a completely wrong result.

*\tFix for escaped backticks still triggering code spans:
\t
\t\tThere are two raw backticks here: \\` and here: \\`, not a code span

*\tFix for an ordered list following an unordered list, and the 
\treverse. There is now a loop in _DoList that does the two 
\tseparately.

*\tFix for nested sub-lists in list-paragraph mode. Previously we got
\ta spurious extra level of `<p>` tags for something like this:

\t\t*\tthis
\t\t
\t\t\t*\tsub
\t\t
\t\t\tthat

*\tFixed some incorrect behaviour with emphasis. This will now work
\tas it should:

\t\t*test **thing***  
\t\t**test *thing***  
\t\t***thing* test**  
\t\t***thing** test*

\t\tName: __________  
\t\tAddress: _______

*\tCorrect a small bug in `_TokenizeHTML` where a Doctype declaration
\twas not seen as HTML.

*\tMajor rewrite of the WordPress integration code that should 
\tcorrect many problems by preventing default WordPress filters from 
\ttampering with Markdown-formatted text. More details here:
\t<http://michelf.com/weblog/2005/wordpress-text-flow-vs-markdown/>


1.0.1a (15 Apr 2005)

*\tFixed an issue where PHP warnings were trigged when converting
\ttext with list items running on PHP 4.0.6. This was comming from 
\tthe `rtrim` function which did not support the second argument 
\tprior version 4.1. Replaced by a regular expression.

*\tMarkdown now filter correctly post excerpts and comment
\texcerpts in WordPress.

*\tAutomatic links and some code sample were \"corrected\" by 
\tthe balenceTag filter in WordPress meant to ensure HTML
\tis well formed. This new version of PHP Markdown postpone this
\tfilter so that it runs after Markdown.

*\tBlockquote syntax and some code sample were stripped by 
\ta new WordPress 1.5 filter meant to remove unwanted HTML 
\tin comments. This new version of PHP Markdown postpone this
\tfilter so that it runs after Markdown.


1.0.1 (16 Dec 2004):

*\tChanged the syntax rules for code blocks and spans. Previously,
\tbackslash escapes for special Markdown characters were processed
\teverywhere other than within inline HTML tags. Now, the contents of
\tcode blocks and spans are no longer processed for backslash escapes.
\tThis means that code blocks and spans are now treated literally,
\twith no special rules to worry about regarding backslashes.

\t**IMPORTANT**: This breaks the syntax from all previous versions of
\tMarkdown. Code blocks and spans involving backslash characters will
\tnow generate different output than before.

\tImplementation-wise, this change was made by moving the call to
\t`_EscapeSpecialChars()` from the top-level `Markdown()` function to
\twithin `_RunSpanGamut()`.

*\tSignificants performance improvement in `_DoHeader`, `_Detab`
\tand `_TokenizeHTML`.

*\tAdded `>`, `+`, and `-` to the list of backslash-escapable
\tcharacters. These should have been done when these characters
\twere added as unordered list item markers.

*\tInline links using `<` and `>` URL delimiters weren't working:

\t\tlike [this](<http://example.com/>)

\tFixed by moving `_DoAutoLinks()` after `_DoAnchors()` in
\t`_RunSpanGamut()`.

*\tFixed bug where auto-links were being processed within code spans:

\t\tlike this: `<http://example.com/>`

\tFixed by moving `_DoAutoLinks()` from `_RunBlockGamut()` to
\t`_RunSpanGamut()`.

*\tSort-of fixed a bug where lines in the middle of hard-wrapped
\tparagraphs, which lines look like the start of a list item,
\twould accidentally trigger the creation of a list. E.g. a
\tparagraph that looked like this:

\t\tI recommend upgrading to version
\t\t8. Oops, now this line is treated
\t\tas a sub-list.

\tThis is fixed for top-level lists, but it can still happen for
\tsub-lists. E.g., the following list item will not be parsed
\tproperly:

\t\t*\tI recommend upgrading to version
\t\t\t8. Oops, now this line is treated
\t\t\tas a sub-list.

\tGiven Markdown's list-creation rules, I'm not sure this can
\tbe fixed.

*\tFix for horizontal rules preceded by 2 or 3 spaces or followed by
\ttrailing spaces and tabs.

*\tStandalone HTML comments are now handled; previously, they'd get
\twrapped in a spurious `<p>` tag.

*\t`_HashHTMLBlocks()` now tolerates trailing spaces and tabs following
\tHTML comments and `<hr/>` tags.

*\tChanged special case pattern for hashing `<hr>` tags in
\t`_HashHTMLBlocks()` so that they must occur within three spaces
\tof left margin. (With 4 spaces or a tab, they should be
\tcode blocks, but weren't before this fix.)

*\tAuto-linked email address can now optionally contain
\ta 'mailto:' protocol. I.e. these are equivalent:

\t\t<mailto:user@example.com>
\t\t<user@example.com>

*\tFixed annoying bug where nested lists would wind up with
\tspurious (and invalid) `<p>` tags.

*\tChanged `_StripLinkDefinitions()` so that link definitions must
\toccur within three spaces of the left margin. Thus if you indent
\ta link definition by four spaces or a tab, it will now be a code
\tblock.

*\tYou can now write empty links:

\t\t[like this]()

\tand they'll be turned into anchor tags with empty href attributes.
\tThis should have worked before, but didn't.

*\t`***this***` and `___this___` are now turned into

\t\t<strong><em>this</em></strong>

\tInstead of

\t\t<strong><em>this</strong></em>

\twhich isn't valid.

*\tFixed problem for links defined with urls that include parens, e.g.:

\t\t[1]: http://sources.wikipedia.org/wiki/Middle_East_Policy_(Chomsky)

\t\"Chomsky\" was being erroneously treated as the URL's title.

*\tDouble quotes in the title of an inline link used to give strange 
\tresults (incorrectly made entities). Fixed.

*\tTabs are now correctly changed into spaces. Previously, only 
\tthe first tab was converted. In code blocks, the second one was too,
\tbut was not always correctly aligned.

*\tFixed a bug where a tab character inserted after a quote on the same
\tline could add a slash before the quotes.

\t\tThis is \"before\"\t[tab] and \"after\" a tab.

\tPreviously gave this result:

\t\t<p>This is \\\"before\\\"  [tab] and \"after\" a tab.</p>

*\tRemoved a call to `htmlentities`. This fixes a bug where multibyte
\tcharacters present in the title of a link reference could lead to
\tinvalid utf-8 characters. 

*\tChanged a regular expression in `_TokenizeHTML` that could lead to
\ta segmentation fault with PHP 4.3.8 on Linux.

*\tFixed some notices that could show up if PHP error reporting 
\tE_NOTICE flag was set.


Copyright and License
---------------------

PHP Markdown
Copyright (c) 2004-2009 Michel Fortin  
<http://michelf.com/>  
All rights reserved.

Based on Markdown  
Copyright (c) 2003-2006 John Gruber   
<http://daringfireball.net/>   
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are
met:

*   Redistributions of source code must retain the above copyright notice,
    this list of conditions and the following disclaimer.

*   Redistributions in binary form must reproduce the above copyright
    notice, this list of conditions and the following disclaimer in the
    documentation and/or other materials provided with the distribution.

*   Neither the name \"Markdown\" nor the names of its contributors may
    be used to endorse or promote products derived from this software
    without specific prior written permission.

This software is provided by the copyright holders and contributors \"as
is\" and any express or implied warranties, including, but not limited
to, the implied warranties of merchantability and fitness for a
particular purpose are disclaimed. In no event shall the copyright owner
or contributors be liable for any direct, indirect, incidental, special,
exemplary, or consequential damages (including, but not limited to,
procurement of substitute goods or services; loss of use, data, or
profits; or business interruption) however caused and on any theory of
liability, whether in contract, strict liability, or tort (including
negligence or otherwise) arising in any way out of the use of this
software, even if advised of the possibility of such damage.
";
    }

    public function getTemplateName()
    {
        return "PsPdfBundle:Example:markdown.pdf.twig";
    }

    public function getDebugInfo()
    {
        return array (  315 => 110,  281 => 95,  709 => 347,  707 => 346,  702 => 344,  693 => 339,  682 => 335,  668 => 327,  664 => 325,  657 => 323,  653 => 322,  650 => 321,  646 => 319,  644 => 318,  630 => 315,  627 => 314,  623 => 313,  616 => 309,  612 => 308,  604 => 306,  582 => 289,  578 => 287,  570 => 285,  566 => 284,  563 => 283,  559 => 282,  552 => 278,  529 => 261,  523 => 257,  516 => 255,  512 => 254,  509 => 253,  505 => 251,  498 => 248,  491 => 246,  484 => 242,  464 => 228,  458 => 224,  450 => 222,  447 => 221,  443 => 220,  408 => 193,  401 => 191,  394 => 189,  388 => 186,  346 => 161,  342 => 159,  334 => 157,  288 => 129,  395 => 175,  392 => 174,  386 => 170,  378 => 167,  375 => 166,  361 => 156,  330 => 156,  327 => 155,  323 => 154,  295 => 124,  291 => 97,  284 => 127,  277 => 94,  271 => 115,  261 => 113,  257 => 112,  250 => 110,  231 => 101,  397 => 190,  390 => 187,  377 => 141,  370 => 138,  352 => 132,  348 => 150,  344 => 149,  335 => 145,  331 => 127,  316 => 150,  304 => 118,  289 => 111,  262 => 89,  244 => 91,  129 => 64,  326 => 118,  324 => 123,  320 => 111,  317 => 115,  306 => 109,  296 => 116,  282 => 95,  249 => 81,  210 => 70,  705 => 153,  703 => 152,  699 => 343,  696 => 150,  688 => 337,  685 => 336,  679 => 140,  675 => 139,  672 => 138,  656 => 125,  640 => 317,  634 => 316,  626 => 122,  614 => 121,  608 => 307,  605 => 119,  589 => 118,  583 => 117,  573 => 116,  562 => 114,  556 => 113,  548 => 277,  544 => 111,  527 => 109,  518 => 102,  502 => 101,  496 => 100,  488 => 99,  476 => 98,  470 => 97,  467 => 96,  451 => 95,  445 => 94,  424 => 91,  418 => 90,  410 => 89,  406 => 88,  389 => 86,  380 => 183,  358 => 77,  350 => 76,  338 => 129,  332 => 74,  313 => 72,  307 => 106,  297 => 70,  286 => 110,  280 => 119,  272 => 92,  251 => 63,  200 => 73,  207 => 122,  248 => 92,  233 => 139,  218 => 74,  174 => 66,  222 => 85,  212 => 81,  197 => 72,  180 => 67,  23 => 3,  245 => 107,  525 => 165,  520 => 162,  507 => 160,  503 => 250,  495 => 247,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 197,  411 => 127,  403 => 125,  400 => 177,  383 => 123,  376 => 182,  372 => 118,  364 => 176,  356 => 133,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 73,  308 => 119,  302 => 89,  279 => 83,  276 => 125,  270 => 80,  267 => 114,  265 => 99,  259 => 77,  239 => 142,  232 => 76,  228 => 75,  216 => 67,  192 => 76,  113 => 55,  137 => 65,  70 => 17,  185 => 64,  172 => 63,  190 => 70,  184 => 69,  181 => 81,  175 => 60,  165 => 75,  153 => 56,  150 => 56,  127 => 49,  124 => 62,  114 => 59,  76 => 20,  236 => 77,  226 => 87,  223 => 73,  205 => 82,  202 => 69,  191 => 76,  155 => 75,  84 => 48,  97 => 52,  81 => 47,  34 => 26,  213 => 70,  206 => 52,  195 => 113,  186 => 58,  178 => 80,  170 => 77,  167 => 76,  161 => 62,  146 => 52,  134 => 50,  104 => 51,  100 => 33,  65 => 35,  300 => 117,  293 => 103,  290 => 86,  256 => 95,  253 => 85,  242 => 78,  225 => 78,  215 => 71,  211 => 86,  198 => 80,  194 => 73,  188 => 88,  160 => 62,  152 => 74,  148 => 69,  126 => 63,  118 => 40,  110 => 42,  90 => 46,  77 => 27,  58 => 32,  53 => 30,  480 => 241,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 215,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 178,  398 => 129,  393 => 126,  387 => 122,  384 => 185,  381 => 168,  379 => 119,  374 => 140,  368 => 177,  365 => 111,  362 => 110,  360 => 134,  355 => 152,  341 => 148,  337 => 146,  322 => 101,  314 => 99,  312 => 109,  309 => 110,  305 => 95,  298 => 100,  294 => 133,  285 => 96,  283 => 88,  278 => 104,  268 => 91,  264 => 90,  258 => 87,  252 => 93,  247 => 84,  241 => 77,  229 => 79,  220 => 54,  214 => 78,  177 => 101,  169 => 57,  140 => 66,  132 => 65,  128 => 60,  107 => 52,  61 => 14,  273 => 124,  269 => 123,  254 => 151,  243 => 106,  240 => 90,  238 => 80,  235 => 104,  230 => 81,  227 => 76,  224 => 99,  221 => 80,  219 => 72,  217 => 95,  208 => 80,  204 => 79,  179 => 84,  159 => 66,  143 => 53,  135 => 50,  119 => 33,  102 => 31,  71 => 18,  67 => 17,  63 => 34,  59 => 36,  38 => 10,  94 => 51,  89 => 28,  85 => 23,  75 => 43,  68 => 36,  56 => 35,  87 => 49,  21 => 2,  26 => 4,  93 => 47,  88 => 28,  78 => 15,  46 => 13,  27 => 5,  44 => 26,  31 => 25,  28 => 5,  201 => 71,  196 => 74,  183 => 56,  171 => 81,  166 => 79,  163 => 78,  158 => 62,  156 => 53,  151 => 70,  142 => 46,  138 => 69,  136 => 49,  121 => 61,  117 => 44,  105 => 55,  91 => 50,  62 => 19,  49 => 8,  24 => 4,  25 => 3,  19 => 1,  79 => 25,  72 => 19,  69 => 40,  47 => 8,  40 => 8,  37 => 4,  22 => 17,  246 => 134,  157 => 61,  145 => 40,  139 => 50,  131 => 61,  123 => 58,  120 => 57,  115 => 44,  111 => 27,  108 => 56,  101 => 35,  98 => 34,  96 => 48,  83 => 44,  74 => 39,  66 => 39,  55 => 31,  52 => 16,  50 => 29,  43 => 12,  41 => 25,  35 => 9,  32 => 6,  29 => 24,  209 => 68,  203 => 66,  199 => 61,  193 => 58,  189 => 110,  187 => 84,  182 => 85,  176 => 65,  173 => 70,  168 => 80,  164 => 63,  162 => 74,  154 => 71,  149 => 73,  147 => 58,  144 => 57,  141 => 70,  133 => 49,  130 => 38,  125 => 59,  122 => 34,  116 => 32,  112 => 44,  109 => 41,  106 => 25,  103 => 34,  99 => 28,  95 => 30,  92 => 18,  86 => 45,  82 => 24,  80 => 43,  73 => 23,  64 => 38,  60 => 11,  57 => 12,  54 => 34,  51 => 33,  48 => 7,  45 => 30,  42 => 29,  39 => 6,  36 => 7,  33 => 22,  30 => 21,);
    }
}
