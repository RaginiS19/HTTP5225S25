Schema::create('professors', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->timestamps();
});
