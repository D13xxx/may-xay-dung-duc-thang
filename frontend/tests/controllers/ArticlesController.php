<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\CatArticles;
use common\models\Parter;
use common\models\Products;
use Yii;
use common\models\Articles;
use common\models\query\ArticlesQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class ArticlesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionListArticles()
    {
        $query = Articles::find()->orderBy(['id'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 5,'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $catArticles = CatArticles::find()->all();
//        $articles = Articles::find()->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('list-articles', [
//            'articles' => $articles,
            'models' => $models,
            'pages' => $pages,
            'catArticles' => $catArticles,
        ]);
    }
    public function actionListArticlesCat($code)
    {
//        $query = Articles::find()->where(['cat_articles_id'=>$code]);
//        $countQuery = clone $query;
//        $pages = new Pagination(['pageSize' => 5,'totalCount' => $countQuery->count()]);
//        $model = $query->offset($pages->offset)
//            ->limit($pages->limit)
//            ->all();
        $catArticlesName = CatArticles::find()->where(['code'=>$code])->one();

        $query = Articles::find()->where(['cat_articles_id'=>$catArticlesName->id])->orderBy(['id'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 5,'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $catArticles = CatArticles::find()->all();
//        $articles = Articles::find()->where(['cat_articles_id'=>$catArticlesName->id])->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('list-articles-cat', [
//            'articles' => $articles,
            'models' => $models,
            'pages' => $pages,
            'catArticles' => $catArticles,
            'catArticlesName' => $catArticlesName,
        ]);
    }

    /**
     * Displays a single Articles model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug)
    {
        $catArticles = CatArticles::find()->all();
        $articles = Articles::find()->where(['slug'=>$slug])->one();
        $listArticlesLimits = Articles::find()->where(['cat_articles_id'=>$articles->cat_articles_id])->orderBy(['id'=>SORT_DESC])->limit(5)->all();
        $tagsNames = explode(',',$articles->tags);
        $listArticles = Articles::find()->all();
        return $this->render('view', [
            'articles' => $articles,
            'catArticles' => $catArticles,
            'listArticlesLimits' => $listArticlesLimits,
            'tagsNames' => $tagsNames,
            'listArticles' => $listArticles,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
