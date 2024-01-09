<?php

use App\Models\User;

test('parent can create a family', function () {
    $user = User::factory()->parent()->create();

    $this->actingAs($user)->post(route('family.store'), [
        'name' => 'Test family',
    ]);

    $this->assertDatabaseHas('families', [
        'name' => 'Test family',
        'user_id' => $user->id,
    ]);
});
