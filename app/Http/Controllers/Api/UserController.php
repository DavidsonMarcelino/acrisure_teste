<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\CheckPoints;
use Illuminate\Http\Request;
use App\Services\UserService;
use LaravelAux\BaseController;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Scheduling\Schedule;

class UserController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        parent::__construct($service, new UserRequest());
    }

    public function resetPassword(Request $data)
    {

        DB::beginTransaction();
        try {
            $user = User::find($data->id);

        if($data->password != $data->password_confirmation){            
            return response()->json('As senhas informadas não conferem', 500);
        }

            if($user){

                $user->password = $data->password;
               
                $user->save();

                DB::commit();
                return response()->json($user, 200);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::debug($e->getMessage());
            return response()->json('Erro ao atualizar os dados do usuário', 500);
        }
    }

    public function getProfile(){
        $user = auth()->user();

        return $user;
    }

    public function saveProfile(Request $request){
        $data = $request->all();
        
        $user = User::find($data['id']);

        $user->name = $data['name'];

        if(isset($data['a_password'])){
            if($data['a_password'] == $data['password_confirmation']){
                $user->password = $data['a_password'];
            } else {
                return response()->json('As senhas informadas não conferem', 500);
            }
        }

        if(isset($data['photo'])){
            Storage::disk('local')->put('user/' . $user->id . '/perfil.png', file_get_contents($data['photo']));
            $user->photo = 'user/' . $user->id . '/perfil.png';
        }


        $user->update();

        return 'ok';
    }

    /**
     * Method to create User
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function store(Request $request)
    {
        $this->validation();
        $condition = $this->service->create($request->all());
        if ($condition['status'] === '00') {
            return response()->json('Registro criado com sucesso!!', 201);
        }
        return response()->json($condition['message'], 500);
    }

    /**
     * Method to update User Information
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function update(Request $request, int $id)
    {
        $this->validation();
        $condition = $this->service->update($request->all(), $id);
        if ($condition['status'] === '00') {
            return response()->json('Registro criado com sucesso', 201);
        }
        return response()->json($condition['message'], 500);
    }

    /**
     * Method to get User Profile Image
     *
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function image($id)
    {
        $user = $this->service->find($id);
        $photo = $user->getAttributes()['photo'];

        if($photo == null){
            return response(file_get_contents(storage_path('app/public/user.png')))
                ->header('Content-Type', 'image/png');
        } else {
            return response(file_get_contents(storage_path('app/' . $user->photo_raw)))
                ->header('Content-Type', 'image/png');
        }
    }

    public function updateImage(array $data, $id)
    {
        DB::beginTransaction();
        try {
            $user = $this->repository->find($id);
            if ($user->update(['photo' => 'user/' . $user->id . '/perfil.png'])) {
                Storage::disk('local')->put('user/' . $user->id . '/perfil.png', file_get_contents($data['photo']));
                DB::commit();
                return ['status' => '00'];
            }
            DB::rollback();
            return ['status' => '01', 'Ocorreu um erro ao realizar o upload da Imagem'];
        } catch (\Exception $e) {
            DB::rollback();
            Log::debug($e->getMessage());
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}