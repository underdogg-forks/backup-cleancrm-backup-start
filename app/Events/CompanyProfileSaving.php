<?php

namespace IP\Events;

use Illuminate\Queue\SerializesModels;
use IP\Modules\CompanyProfiles\Models\CompanyProfile;

class CompanyProfileSaving extends Event
{
    use SerializesModels;

    public function __construct(CompanyProfile $companyProfile)
    {
        $this->companyProfile = $companyProfile;
    }
}