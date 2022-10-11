<?php


use League\CommonMark\CommonMarkConverter;


function parseMarkdown($text)
{
    $converter =  new CommonMarkConverter(['html_input' => 'escape', 'allow_unsafe_links' => false]);
    return  $converter->convert($text)->getContent();
}
