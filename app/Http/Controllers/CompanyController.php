<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreCompanyRequest, UpdateCompanyRequest};
use App\Http\Resources\{CompanyCollection, CompanyResource};
use App\Models\Company;
use App\Repositories\CompanyRepositoryInterface;
use Illuminate\Http\JsonResponse;


class CompanyController extends Controller
{
    /**
     * @var CompanyRepositoryInterface
     */
    private CompanyRepositoryInterface $companyRepo;

    /**
     * CompanyController constructor.
     * @param CompanyRepositoryInterface $companyRepo
     */
    public function __construct(CompanyRepositoryInterface $companyRepo)
    {
        $this->companyRepo = $companyRepo;
    }

    /**
     * Display a listing of the resource.
     *  * @return CompanyCollection|JsonResponse
     */
    public function index(): CompanyCollection|JsonResponse
    {
        try {
            return new CompanyCollection($this->companyRepo->getAll());
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreCompanyRequest $request
     * @return JsonResponse
     */

    public function store(StoreCompanyRequest $request): JsonResponse
    {
        try {
            $company = $this->companyRepo->create($request->all());

            return response()->json(
                [
                    'message' => 'Success',
                    'companyId' => $company->id
                ]
            );
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     * @param string $id
     * @return JsonResponse|CompanyResource
     */
    public function show(string $id): JsonResponse|CompanyResource
    {
        try {
            return new CompanyResource($this->companyRepo->findOneById($id));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @return JsonResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company): JsonResponse
    {
        try {
            $this->companyRepo->update($request->all(), $company);

            return response()->json(['message' => 'Success']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $this->companyRepo->delete($id);

            return response()->json(['message' => 'Success']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
