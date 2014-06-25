<?php

/* academicoBundle:Default:cajaLogin.html.twig */
class __TwigTemplate_b7b65c1a204c54e749dd1a563597120538e0bf58b5e3a1d4e27ef883c9c0e538 extends Twig_Template
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
        // line 2
        echo "

    <a class=\"boton\" href=\"";
        // line 4
        echo $this->env->getExtension('routing')->getPath("estudiante_registro");
        echo "\">Registrate</a>
    <h2>Accede a tu cuenta</h2>
    <form action=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("estudiante_registro");
        echo "\" method=\"post\" >


                <label for=\"login_user\">Email:</label>
                <input id=\"login_user\" type=\"text\" name=\"_username\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, ((array_key_exists("last_username", $context)) ? (_twig_default_filter((isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "")) : ("")), "html", null, true);
        echo "\" autocomplete=\"off\"/>            
                <label for=\"login_pass\">Contraseña:</label>
                <input id=\"login_pass\" type=\"password\" name=\"_password\"/><br>
                <input type=\"checkbox\" id=\"no_cerrar\" name=\"_remember_me\" checked/>
                <label for=\"no_cerrar\">No cerrar sesión</label>
                <input type=\"submit\" value=\"Entrar\" class=\"boton\"/>
                <input type=\"hidden\" name=\"_target_path\" value=\"/usuario/compras\" />
    </form>

";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:cajaLogin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 10,  28 => 6,  23 => 4,  19 => 2,);
    }
}
