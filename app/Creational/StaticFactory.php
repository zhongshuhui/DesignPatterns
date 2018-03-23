<?php
namespace App\Creational;

/**
 * 注意点1: 记住，静态意味着全局状态，因为它不能被模拟进行测试，所以它是有弊端的
 * 注意点2: 不能被分类或模拟或有多个不同的实例。
 */
final class StaticFactory
{
    /**
     * @param string $type
     *
     * @return FormatterInterface
     */
    public static function factory($type)
    {
        if ($type == 'number') {
            return new FormatNumber();
        }

        if ($type == 'string') {
            return new FormatString();
        }

        throw new \InvalidArgumentException('Unknown format given');
    }
}

interface FormatterInterface
{
    public function example();
}

class FormatString implements FormatterInterface
{
    public function example(){
        echo 'FormatString Example';
    }
}

class FormatNumber implements FormatterInterface
{
    public function example(){
        echo 'FormatNumber Example';
    }
}