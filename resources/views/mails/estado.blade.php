<h3>Hola, {{$primer_nombre.' '. $primer_apellido}}, tu solicitud de registro ha sido actualizada:</h3>
@if ($estado_id == 2)
    <h2>Estado: Aceptado</h2>
@else
    <h2>Estado: Rechazado</h2>
    
@endif
