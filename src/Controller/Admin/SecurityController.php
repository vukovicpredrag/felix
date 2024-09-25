<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('admin/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('/login/index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
            // OPTIONAL parameters to customize the login form:
            // the title visible above the login form (define this option only if you are
            // rendering the login template in a regular Symfony controller; when rendering
            // it from an EasyAdmin Dashboard this is automatically set as the Dashboard title)
            'page_title' => '<p style="display:none">Hanna - Admin Panel</p><img src="/assets/images/hanna-logo.avif" width="180" style="margin: 10px">',
            // the string used to generate the CSRF token. If you don't define
            // this parameter, the login form won't include a CSRF token
            'csrf_token_intention' => 'authenticate',

            // the URL users are redirected to after the login (default: '/admin')
            'target_path' => $this->generateUrl('admin'),
            'forgot_password_enabled' => 'true',
           // 'forgot_password_path' => $this->generateUrl('app_forgot_password_request'),


            // app name
            'app_name'=>'Arvy',

            // set favicon path
            'favicon_path' => '',

        ]);

    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            // adds the CSS and JS assets associated to the given Webpack Encore entry
            // it's equivalent to adding these inside the <head> element:
            // {{ encore_entry_link_tags('...') }} and {{ encore_entry_script_tags('...') }}
            ->addWebpackEncoreEntry('admin-app')

            // it's equivalent to adding this inside the <head> element:
            // <link rel="stylesheet" href="{{ asset('...') }}">
            ->addCssFile('build/admin.css')
            ->addCssFile('https://example.org/css/admin2.css')

            // it's equivalent to adding this inside the <head> element:
            // <script src="{{ asset('...') }}"></script>
            ->addJsFile('build/admin.js')
            ->addJsFile('https://example.org/js/admin2.js')

            // use these generic methods to add any code before </head> or </body>
            // the contents are included "as is" in the rendered page (without escaping them)
            ->addHtmlContentToHead('<link rel="dns-prefetch" href="https://assets.example.com">')
            ->addHtmlContentToBody('<script> ... </script>')
            ->addHtmlContentToBody('<!-- generated at '.time().' -->')
            ;
    }

    /**
     * Logout action
     */
    #[Route('admin/logout', name: 'app_logout')]
    public function logout()
    {
        $this->redirectToRoute('app_login');
    }



}