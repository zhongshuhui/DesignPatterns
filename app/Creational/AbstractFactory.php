<?php
namespace App\Creational;

/**
 * 在这种情况下，抽象工厂是创建一些组件的契约
 * 在 Web 中。 有两种呈现文本的方式：HTML 和 JSON
 */
abstract class AbstractFactory
{
    abstract public function createText($content);
}

class JsonFactory extends AbstractFactory
{
    public function createText($content)
    {
        return new JsonText($content);
    }
}

class HtmlFactory extends AbstractFactory
{
    public function createText($content)
    {
        return new HtmlText($content);
    }
}

abstract class Text
{
    /**
     * @var string
     */
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }
}

class JsonText extends Text
{
    // 你的逻辑代码
}

class HtmlText extends Text
{
    // 你的逻辑代码
}