<?php

namespace App\Http\Controllers;

use App\Exports\TechnologiesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\TechnologyRequest;
use App\Http\Resources\Api\ApiError;
use App\Http\Resources\Api\ApiSuccess;
use App\Http\Resources\TechnologyResource;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class TechnologyController extends Controller
{
    public function data(Request $request)
    {
        $data = Technology::paginate($request->per_page ?? 10);
        return TechnologyResource::collection($data);
    }

    public function store(TechnologyRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = [
                'name'          => $request->name,
                'description'   => $request->desc
            ];

            $new = Technology::create($data);
            DB::commit();

            return (new ApiSuccess())($new);
        } catch (Throwable $th) {
            DB::rollBack();
            return (new ApiError())($th->getMessage());
        }
    }

    public function update(int $id, TechnologyRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = [
                'name'          => $request->name,
                'description'   => $request->description
            ];

            $update = Technology::find($id)->update($data);

            DB::commit();
            return (new ApiSuccess())($update);
        } catch (Throwable $th) {
            DB::rollBack();
            return (new ApiError())($th->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            Technology::find($request->id)->delete();

            DB::commit();
            return (new ApiSuccess())('Successfully Delete');
        } catch (Throwable $th) {
            DB::rollBack();
            return (new ApiError())($th->getMessage());
        }
    }

    public function export()
    {
        return Excel::download(new TechnologiesExport, 'techs.xlsx');
    }
}
