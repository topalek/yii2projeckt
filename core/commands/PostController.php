<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Post;
use Faker\Factory;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PostController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $count the message to be echoed.
     */
    public function actionIndex($count = 5)
    {
        for ($i=1;$i<=$count;$i++){
            $post = new Post();
            $fake = Factory::create('ru_RU');
            $post->title =$fake->sentence;
            $post->text = $fake->paragraph;
            $post->content = $fake->realText(400);
            if(!$post->save()){
                print_r($post->errors);
            }
        }
        print_r("\nCreating Posts complete\n");
    }
}
