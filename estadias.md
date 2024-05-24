
crear la migración de la tabla de tareas

```bash
php artisan make:migration create_tareas_table
```

dejé la migración así

```php
Schema::create('tareas', function (Blueprint $table) {
	$table->id();
	$table->string('titulo');
	$table->text('descripcion');
	$table->unsignedBigInteger('fk_usuario');
	$table->enum('estatus', ['completado', 'pendiente'])->default('pendiente');
	$table->timestamps();

	$table->foreign('fk_usuario')->references('id')->on('users');
});
```


ejecutra migración
```bash
php artisan migrate
```


crear modelo

```bash
php artisan make:model Tarea
```

y agregamos los campos que se van a llenar, con el **$fillable**

```php
protected $fillable = ['titulo', 'descripcion', 'fk_usuario', 'estatus'];
```

creamos la relación con el modelo de **User**
podemos omitir esto, pero es para facilitar más las cosas.

esto va en la clase de **Tareas**, y le decimos que pertenece a un **User**
```php
public function user()
{
	return $this->belongsTo(User::class);
}
```

y esto va en la clase de **User**, y le decimos que contiene varias **Tareas**

```php
public function tareas()
{
	return $this->hasMany(Tarea::class);
}
```


Aquí unos ejemplos para traer el usuario desde la tarea

```php
$tarea = Tarea::find(1);
$usuario = $tarea->user;
```

Aquí unos ejemplos para traer el la tarea desde el usuario

```php
$usuario = User::find(1);
$tareas = $usuario->tareas;
```

ahora si, necesito un controlador para las tareas, así que vamos a darle.
se puede usar cualquiera de los 2

```bash
php artisan make:controller TareaController --resource
php artisan make:controller TareaController -r
```

luego tengo que crear una carpeta o algún archivo con extensión **.blade.php** y asignarlo al index del TareaController

```php
return view('tareas.index')
```

ahora debo crear el componente de livewire, vamos a darle

