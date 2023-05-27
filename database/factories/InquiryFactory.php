<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inquiry>
 */
class InquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition($communityId=0,$parentId=0)
    {
        return [
            'community_id'=>$communityId,
            'parent_id'=>1,
            'root_id'=>1,
            'title'=>$this->faker->text(5),
            'email'=>$this->faker->email,
            'phone'=>$this->faker->phoneNumber,
            'content'=>$this->faker->text,
            'admin_user_id'=>2,
        ];
    }

    // public function withParam($CommunityId){
    //     return $this->state([
    //         'community_id' => $CommunityId,
    //     ]);
    // }
}
