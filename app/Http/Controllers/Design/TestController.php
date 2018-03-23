<?php

namespace App\Http\Controllers\Design;

use App\Creational\Book;
use App\Creational\DatabaseConfiguration;
use App\Creational\DatabaseConnection;
use App\Creational\EBookAdapter;
use App\Creational\FactoryMethod;
use App\Creational\GermanFactory;
use App\Creational\JsonFactory;
use App\Creational\Kindle;
use App\Creational\RecordProxy;
use App\Creational\StaticFactory;
use App\Http\Controllers\Controller;
use App\Creational\SimpleFactory;
use App\Creational\Singleton;
class TestController extends Controller
{

    public function index(){
        echo 'hello word!';
    }

    /******************创建型设计模式**************************************************************************************************************/

   /*
    *  简单工厂模式简单工厂模式是一个精简版的工厂模式。
    * 它与静态工厂模式最大的区别是它不是『静态』的。
    * 因为非静态，所以你可以拥有多个不同参数的工厂，你可以为其创建子类。甚至可以模拟（Mock）他，这对编写可测试的代码来讲至关重要。
    * 这也是它比静态工厂模式受欢迎的原因！
    */
    public function simpleFactory(){
        $factory = new SimpleFactory();
        $bicycle = $factory->createBicycle();
        $bicycle->driveTo('Paris');
        $bicycle->driveBack('Turkey');
    }

  /*
   * 静态工厂模式与抽象工厂模式类似，此模式用于创建一系列相关或相互依赖的对象。
   * 『静态工厂模式』与『抽象工厂模式』的区别在于，只使用一个静态方法来创建所有类型对象，
   * 此方法通常被命名为 factory 或 build。
   */
    public function staticFactory(){
        $staticFactory=StaticFactory::factory('string');
        $staticFactory->example();
    }

    /*
     * 抽象工厂模式
     * 在不指定具体类的情况下创建一系列相关或依赖对象。
     * 通常创建的类都实现相同的接口。
     * 抽象工厂的客户并不关心这些对象是如何创建的，它只是知道它们是如何一起运行的。
     */
    public function abstractFactory(){
        $factory = new JsonFactory();
        $text = $factory->createText('foobar');
    }

    /*
     * 简单工厂模式的优点是，您可以将其子类用不同的方法来创建一个对象。
     * 举一个简单的例子，这个抽象类可能只是一个接口。
     * 这种模式是「真正」的设计模式， 因为他实现了S.O.L.I.D原则中「D」的 「依赖倒置」。
     * 这意味着工厂方法模式取决于抽象类，而不是具体的类。 这是与简单工厂模式和静态工厂模式相比的优势。
     */
    public function FactoryMethod(){
        $factory = new GermanFactory();
        $result = $factory->create(FactoryMethod::CHEAP);
    }

    /*
     * 目的:在应用程序调用的时候，只能获得一个对象实例。
     * 例子:
     *     数据库连接
     *     日志 (多种不同用途的日志也可能会成为多例模式)
     *     在应用中锁定文件 (系统中之存在一个 ...)
     */
    public function singleton(){
        Singleton::getInstance();
    }

    /***********结构型设计模式*********************************************************************************************************************/

    /*
     *  适配器模式
     * 目的:将一个类的接口转换成可应用的兼容接口。适配器使原本由于接口不兼容而不能一起工作的那些类可以一起工作。
     * 例子:
     *     客户端数据库适配器
    *      使用多个不同的网络服务和适配器来规范数据使得出结果是相同的
     */
    public function adapter(){
        $book = new Book();
        $book->open();
        $book->turnPage();
        $book->getPage();


        $kindle = new Kindle();
        $book = new EBookAdapter($kindle);
        $book->open();
        $book->turnPage();
        $book->getPage();
    }

    /*
     * 依赖注入模式
     * 目的:用松散耦合的方式来更好的实现可测试、可维护和可扩展的代码。
     * 用法:DatabaseConfiguration 被注入  DatabaseConnection  并获取所需的  $config 。
     *      如果没有依赖注入模式， 配置将直接创建  DatabaseConnection 。这对测试和扩展来说很不好。
     * 例子
     *     Doctrine2 ORM 使用依赖注入。 例如，注入到  Connection  对象的配置。
     *      对于测试而言， 可以轻松的创建可扩展的模拟数据并注入到  Connection  对象中。
     *      Symfony 和 Zend Framework 2 已经有了依赖注入的容器。他们通过配置的数组来创建对象，并在需要的地方注入 (在控制器中)。
     */
    public function dependencyInjection(){
        $config = new DatabaseConfiguration('localhost', 3306, 'domnikl', '1234');
        $connection = new DatabaseConnection($config);
        $connection->getDsn();
    }

    /*
     * 代理模式
     *目的:链接任何具有高价值或无法复制的代码。
     *Examples:Doctrine2 使用代理来实现框架的“魔术”（例如：延迟加载），而用户仍然使用他们自己的实体类且不会使用到代理。
     */
    public function proxy(){
        $data=[];
        $recordProxy=new RecordProxy($data);
        $recordProxy->isDirty();
    }

}
