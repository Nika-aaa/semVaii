<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\Service;
use App\Models\TranslatorServices;

class TranslatorServicesController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html();
    }

    public function deleteService() :JsonResponse {
        $serviceId = $this->request()->getValue('idServ');
        $translatorId = $this->request()->getValue('idTran');

        if ($serviceId && $translatorId) {
            $service = TranslatorServices::getAll("id_tran_fk = ? and id_serv_fk = ?", [$translatorId, $serviceId]);
            if ($service){
                $service[0]->delete();
                return $this->json(true);
            } else {
                return $this->json(false);
            }
        }
        return $this->json(false);
    }

    public function addService() :JsonResponse {
        $serviceId = $this->request()->getValue('idServ');
        $translatorId = $this->request()->getValue('idTran');

        if ($serviceId && $translatorId) {
            $service = new TranslatorServices();
            $service->setIdServFk($serviceId);
            $service->setIdTranFk($translatorId);

            $service->save();

            return $this->json(true);
        }
        return $this->json(false);

    }
}