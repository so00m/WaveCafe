<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    private $index = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $messages = Message::orderBy('id')->get();
        
        $message = $messages[$this->index]; 

        $this->index++;

        if ($this->index >= $messages->count()) {
            $this->index = 0;
        }

        return [
            'full_name' => $message->full_name, 
            'content' => $message->content,   
            'created_at' => $message->created_at, 
            'is_read' => 0, 
            'message_id' => $message->id, 
        ];

    }
}
