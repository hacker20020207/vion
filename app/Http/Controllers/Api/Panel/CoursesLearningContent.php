<?php

namespace App\Http\Controllers\Api\Panel;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesLearningContent extends Controller
{
    public function renderWebUrl(Request $request, User $user)
    {
        $data = $request->all();
        validateParam($data, [
            'file' => 'required|exists:files,id',
            'slug' => 'required|exists:webinars,slug',
        ]);

        $file = $data['file'];
        $slug = $data['slug'];

        Auth::login($user);

        $url = "/course/learning/{$slug}?type=file&item={$file}";
        return redirect(url($url));
    }

}
