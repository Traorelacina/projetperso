<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

          Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); // Pour garantir l'unicité du slug
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });



        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('region_id')->nullable()->constrained();
            $table->enum('profile_type', ['farmer', 'merchant', 'admin', 'logistics']);
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('farm_name');
            $table->float('farm_size')->nullable();
            $table->text('farm_description')->nullable();
            $table->integer('experience_years')->nullable();
            $table->json('certifications')->nullable();
            $table->integer('production_capacity')->nullable();
            $table->decimal('farm_latitude', 10, 7)->nullable();
            $table->decimal('farm_longitude', 10, 7)->nullable();
            $table->timestamps();
        });

        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('business_name');
            $table->string('business_type')->nullable();
            $table->text('business_description')->nullable();
            $table->string('tax_id')->nullable();
            $table->integer('years_in_business')->nullable();
            $table->json('preferred_payment_methods')->nullable();
            $table->decimal('business_latitude', 10, 7)->nullable();
            $table->decimal('business_longitude', 10, 7)->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('unit_price', 10, 2);
            $table->string('unit_type')->default('kg');
            $table->decimal('available_quantity', 10, 2);
            $table->decimal('min_order_quantity', 10, 2)->default(1);
            $table->date('harvest_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->boolean('is_organic')->default(false);
            $table->json('certifications')->nullable();
            $table->enum('status', ['active', 'inactive', 'sold_out'])->default('active');
            $table->timestamps();
        });

        Schema::create('price_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->date('date_effective');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->constrained()->onDelete('cascade');
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->string('payment_method');
            $table->text('delivery_address');
            $table->dateTime('delivery_date')->nullable();
            $table->text('notes')->nullable();
            $table->string('transaction_reference')->nullable();
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('farmer_id')->constrained()->onDelete('cascade');
            $table->decimal('quantity', 10, 2);
            $table->decimal('unit_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->timestamps();
        });

        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('carrier_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('status', ['pending', 'assigned', 'in_transit', 'delivered', 'failed'])->default('pending');
            $table->dateTime('estimated_delivery')->nullable();
            $table->dateTime('actual_delivery')->nullable();
            $table->text('delivery_notes')->nullable();
            $table->decimal('current_latitude', 10, 7)->nullable();
            $table->decimal('current_longitude', 10, 7)->nullable();
            $table->timestamps();
        });

        Schema::create('delivery_routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_id')->constrained()->onDelete('cascade');
            $table->json('route_coordinates');
            $table->decimal('distance', 10, 2)->nullable();
            $table->integer('estimated_duration')->nullable(); // en minutes
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->string('payment_method');
            $table->string('transaction_id')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->text('payment_details')->nullable();
            $table->timestamps();
        });

       

        Schema::create('weather_forecasts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->date('forecast_date');
            $table->decimal('min_temperature', 5, 2);
            $table->decimal('max_temperature', 5, 2);
            $table->string('condition');
            $table->decimal('precipitation', 5, 2)->nullable();
            $table->decimal('humidity', 5, 2)->nullable();
            $table->decimal('wind_speed', 5, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('training_resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('type'); // video, pdf, article
            $table->string('file_path')->nullable();
            $table->string('external_url')->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->json('tags')->nullable();
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('message');
            $table->string('type');
            $table->json('data')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });

        Schema::create('merchant_favorite_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['merchant_id', 'product_id']);
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->morphs('rateable'); // Peut être farmerId ou productId
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->timestamps();
        });

        Schema::create('credit_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->string('purpose');
            $table->integer('term_months');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('credit_applications');
        Schema::dropIfExists('ratings');
        Schema::dropIfExists('merchant_favorite_products');
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('training_resources');
        Schema::dropIfExists('weather_forecasts');
        Schema::dropIfExists('regions');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('delivery_routes');
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('price_histories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('merchants');
        Schema::dropIfExists('farmers');
        Schema::dropIfExists('users');
    }
};