<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        elseif (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/ajouter')) {
                if (0 === strpos($pathinfo, '/ajouterArticle')) {
                    // ajouterArticle
                    if (preg_match('#^/ajouterArticle/(?P<libelle>[^/]++)/(?P<codebarres>[^/]++)/(?P<marque>[^/]++)/(?P<type>[^/]++)/(?P<description>[^/]++)/(?P<note>[^/]++)/(?P<poids>[^/]++)/(?P<couleur>[^/]++)/(?P<taille>[^/]++)/(?P<prix>[^/]++)/(?P<id_magasin>[^/]++)/(?P<id_utilisateur>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajouterArticle')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::ajouterArticleAction',));
                    }

                    // ajouterArticleListe
                    if (0 === strpos($pathinfo, '/ajouterArticleListe') && preg_match('#^/ajouterArticleListe/(?P<id_article>[^/]++)/(?P<id_liste>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajouterArticleListe')), array (  '_controller' => 'AppBundle\\Controller\\ListeCoursesController::ajouterArticleListeAction',));
                    }

                }

                // ajouterCarte
                if (0 === strpos($pathinfo, '/ajouterCarte') && preg_match('#^/ajouterCarte/(?P<id_utilisateur>[^/]++)/(?P<id_enseigne>[^/]++)/(?P<codebarres>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajouterCarte')), array (  '_controller' => 'AppBundle\\Controller\\CarteFideliteController::ajouterCarteAction',));
                }

                // ajouterFavoris
                if (0 === strpos($pathinfo, '/ajouterFavoris') && preg_match('#^/ajouterFavoris/(?P<id_article>[^/]++)/(?P<id_utilisateur>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ajouterFavoris')), array (  '_controller' => 'AppBundle\\Controller\\FavorisController::ajouterFavorisAction',));
                }

            }

            elseif (0 === strpos($pathinfo, '/afficher')) {
                // afficherListeFavoris
                if (0 === strpos($pathinfo, '/afficherListeFavoris') && preg_match('#^/afficherListeFavoris/(?P<id_utilisateur>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'afficherListeFavoris')), array (  '_controller' => 'AppBundle\\Controller\\FavorisController::afficherListeFavorisAction',));
                }

                // afficherListeCourses
                if (0 === strpos($pathinfo, '/afficherListeCourses') && preg_match('#^/afficherListeCourses/(?P<id_utilisateur>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'afficherListeCourses')), array (  '_controller' => 'AppBundle\\Controller\\ListeCoursesController::afficherListeCoursesAction',));
                }

                // afficherArticleListe
                if (0 === strpos($pathinfo, '/afficherArticleListe') && preg_match('#^/afficherArticleListe/(?P<id_utilisateur>[^/]++)/(?P<id_liste>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'afficherArticleListe')), array (  '_controller' => 'AppBundle\\Controller\\ListeCoursesController::afficherArticleListeAction',));
                }

            }

            // addUser
            if (0 === strpos($pathinfo, '/addUser') && preg_match('#^/addUser/(?P<nom>[^/]++)/(?P<prenom>[^/]++)/(?P<email>[^/]++)/(?P<pwd>[^/]++)/(?P<addresse>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'addUser')), array (  '_controller' => 'AppBundle\\Controller\\UtilisateurController::addUserAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/get')) {
            if (0 === strpos($pathinfo, '/getArticleBy')) {
                // getArticleById
                if (0 === strpos($pathinfo, '/getArticleById') && preg_match('#^/getArticleById/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'getArticleById')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::getArticleByIdAction',));
                }

                // getArticleByRef
                if (0 === strpos($pathinfo, '/getArticleByRef') && preg_match('#^/getArticleByRef/(?P<codebarres>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'getArticleByRef')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::getArticleByRefAction',));
                }

                // getArticleByNom
                if (0 === strpos($pathinfo, '/getArticleByNom') && preg_match('#^/getArticleByNom/(?P<libelle>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'getArticleByNom')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::getArticleByNomAction',));
                }

            }

            elseif (0 === strpos($pathinfo, '/getComparaison')) {
                // getComparaison
                if (preg_match('#^/getComparaison/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'getComparaison')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::getComparaisonAction',));
                }

                // getComparaisonDate
                if (0 === strpos($pathinfo, '/getComparaisonDate') && preg_match('#^/getComparaisonDate/(?P<id_article>[^/]++)/(?P<id_magasin>[^/]++)/(?P<dateDeb>[^/]++)/(?P<dateFin>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'getComparaisonDate')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::getComparaisonDateAction',));
                }

            }

            elseif (0 === strpos($pathinfo, '/getListe')) {
                // getListeArticle
                if (0 === strpos($pathinfo, '/getListeCapture') && preg_match('#^/getListeCapture/(?P<id_article>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'getListeArticle')), array (  '_controller' => 'AppBundle\\Controller\\CaptureController::getListeCaptureAction',));
                }

                // getListeCartesFidelite
                if (0 === strpos($pathinfo, '/getListeCartesFidelite') && preg_match('#^/getListeCartesFidelite/(?P<id_utilisateur>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'getListeCartesFidelite')), array (  '_controller' => 'AppBundle\\Controller\\CarteFideliteController::getListeCartesFideliteAction',));
                }

                if (0 === strpos($pathinfo, '/getListeMagasin')) {
                    // getListeMagasin
                    if (preg_match('#^/getListeMagasin/(?P<lat>[^/]++)/(?P<long>[^/]++)/(?P<km>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'getListeMagasin')), array (  '_controller' => 'AppBundle\\Controller\\MagasinController::getListeMagasin',));
                    }

                    // getListeMagasins
                    if ('/getListeMagasins' === $pathinfo) {
                        return array (  '_controller' => 'AppBundle\\Controller\\MagasinController::getListeMagasinsAction',  '_route' => 'getListeMagasins',);
                    }

                }

            }

        }

        elseif (0 === strpos($pathinfo, '/supprimer')) {
            // supprimerCarte
            if (0 === strpos($pathinfo, '/supprimerCarte') && preg_match('#^/supprimerCarte/(?P<id_carte>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'supprimerCarte')), array (  '_controller' => 'AppBundle\\Controller\\CarteFideliteController::supprimerCarteAction',));
            }

            // supprimerFavoris
            if (0 === strpos($pathinfo, '/supprimerFavoris') && preg_match('#^/supprimerFavoris/(?P<id_favoris>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'supprimerFavoris')), array (  '_controller' => 'AppBundle\\Controller\\FavorisController::supprimerFavorisAction',));
            }

            // supprimerArticleListe
            if (0 === strpos($pathinfo, '/supprimerArticleListe') && preg_match('#^/supprimerArticleListe/(?P<id_article>[^/]++)/(?P<id_liste>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'supprimerArticleListe')), array (  '_controller' => 'AppBundle\\Controller\\ListeCoursesController::supprimerArticleListeAction',));
            }

        }

        // homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'homepage'));
            }

            return $ret;
        }
        not_homepage:

        // CreerListe
        if (0 === strpos($pathinfo, '/CreerListe') && preg_match('#^/CreerListe/(?P<id_utilisateur>[^/]++)/(?P<nom>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'CreerListe')), array (  '_controller' => 'AppBundle\\Controller\\ListeCoursesController::CreerListeAction',));
        }

        // checkUser
        if (0 === strpos($pathinfo, '/checkUser') && preg_match('#^/checkUser/(?P<email>[^/]++)/(?P<pwd>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'checkUser')), array (  '_controller' => 'AppBundle\\Controller\\UtilisateurController::checkUserAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
