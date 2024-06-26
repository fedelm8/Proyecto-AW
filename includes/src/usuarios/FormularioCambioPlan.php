<?php
namespace es\ucm\fdi\aw\usuarios;

use es\ucm\fdi\aw\Aplicacion;
use es\ucm\fdi\aw\Formulario;

class FormularioCambioPlan extends Formulario
{
    public function __construct() {
        parent::__construct('formCambioPlan', ['urlRedireccion' => Aplicacion::getInstance()->resuelve('/perfil.php')]);
    }
    
    protected function generaCamposFormulario(&$datos)
    {
        // Se genera el HTML asociado a los campos del formulario.
        $html = <<<EOF
        <fieldset>
            <legend>Cambiar Plan</legend>
            <div>
                <p>Plan Actual: {$_SESSION["rol"]}</p>
                <label for="nuevo_plan">Nuevo Plan:</label>
                <select id="nuevo_plan" name="nuevo_plan">
                    <option value="free">Free</option>
                    <option value="premium">€ Premium €</option>
                </select>
            </div>
            <div>
                <button type="submit" name="cambiar_plan">Cambiar Plan</button>
            </div>
        </fieldset>
        EOF;
        return $html;
    }

    protected function procesaFormulario(&$datos)
    {
        // Verifica si se ha enviado el plan seleccionado
        if (isset($datos['nuevo_plan'])) {
            // Obtiene el nuevo plan seleccionado por el usuario
            $nuevoPlan = $datos['nuevo_plan'];

            // Actualiza el plan del usuario en la sesión
            $_SESSION["rol"] = $nuevoPlan;

            // Redirige al usuario de vuelta a la página de perfil
            header("Location: " . $this->urlRedireccion);
            exit;
        }
    }
}
