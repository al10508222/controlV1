<?php

namespace Database\Seeders;

use App\Models\CatDay;
use App\Models\CatTimeZone;
use App\Models\EmployeeAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
            BootSeeder::class,
            UserSeeder::class,
            UserProfileSeeder::class,
            CatModulesSeeder::class,
            CatContractTypeSeeder::class,
            CatGenderSeeder::class,
            CatMaritalStatusSeeder::class,
            CatEducationalLevelSeeder::class,
            CatDocumentSeeder::class,
            CatBankSeeder::class,
            CatBankAccoutTypeSeeder::class,
            CatCountriesTableSeeder::class,
            CatStatesTableSeeder::class,
            CatEducationStatusSeeder::class,
            CatDependencySeeder::class,
            CatUnitSeeder::class,
            CatPermissionsSeeder::class,
            // RoleHasPermissionSeeder::class,
            RoleHasPermissionsTableSeeder::class,
            CatPeriodicityTypeSeeder::class,
            CatRulesImssDeductionSeeder::class,
            CatConceptImssDeductionSeeder::class,
            CatEmploymentTypeSeeder::class,
            CatEmploymentLocationSeeder::class,
            CatEmploymentClientSeeder::class,
            CatConceptTypeSeeder::class,
            CatSatConceptsTableSeeder::class,
            CatSatGroupingKeySeeder::class,
            CatConceptCalculationTypeSeeder::class,
            CatCoreExpressionTypeSeeder::class,
            CatCoreExpressionSeeder::class,
            // CatConceptPeriodicityTypeSeeder::class,
            CatYearlyVariableTypeSeeder::class,
            CatYearlyVariableSeeder::class,
            PayrollIsrConfigsTableSeeder::class,
            IsrWithholdingsTableSeeder::class,
            PayrollEmploymentSubsidiesConfigsSeeder::class,
            EmploymentSubsidiesWithholdingsSeeder::class,
            CatTypeDataSeeder::class,
            CatPayrollStatusSeeder::class,
            Catalogs\CatEmployeeStatusSeeder::class,
            ImssDeductionsSeeder::class,
            ImssConfigsSeeder::class,
            TabulatorSeed::class,
            PositionSeed::class,
            EmployeeSeed::class,
            System\SystemPaymentConfigSeeder::class,
            CatPaydaySeeder::class,
            CatRetirementAccountSeeder::class,
            Catalogs\CatPaymentStatusesSeeder::class,
            Catalogs\CatPaymentActivityStatusSeeder::class,
            CatTransactionSeeder::class,
            CatCustomFieldSeeder::class,
            ConceptsTableSeeder::class,
            ConceptHasCoreExpressionTableSeeder::class,
            ConceptHasContractTypeTableSeeder::class,
            ClientSeeder::class,
            ProjectSeeder::class,
            CatEmployeeIncidentTypeSeeder::class,
            CatEmployeeIncidentInabilityTypeSeeder::class,
            ReportsGroupSeeder::class,
            ReportsGroupSectionSeeder::class,
            CatReportsSeeder::class,
            CatMonthSeeder::class,
            CatConceptIsssteDeductionSeeder::class,
            IsssteDeductionsSeeder::class,
            IsssteConfigSeeder::
            class,
            CatBudgetItemChaptersTableSeeder::class,
            CatBudgetItemConceptsTableSeeder::class,
            CatGenericBudgetItemsTableSeeder::class,
            CatSpecificBudgetItemsTableSeeder::class,
            Catalogs\CatOffWorkReasonsTableSeeder::class,
            CatTimeZoneSeeder::class,
            CatDaySeeder::class,
            ScheduleSeeder::class,
            CatAuditMovementTypeSeeder::class,
            LawVacationSeeder::class,
            LawVacationsConfigsTableSeeder::class,
            FiveYearBonusSeeder::class,
            FiveYearBonusConfigsTableSeeder::class,
            /**
             * clases pesadas omitir para pruebas
             */
            CatCucopsTableSeeder::class,
            TipoVialidadSeeder::class,
            EntidadesFederativasTableSeeder::class,
            MunicipiosTableSeeder::class,
            LocalidadesTableSeeder::class,
            /**
             * fin de clases pesadas
             */
            EstatusAcreditacionTableSeeder::class,
            EstratoUnidadTableSeeder::class,
            TipoAsentamientosTableSeeder::class,
            
            EstablecimientoTableSeeder::class,
            EstatusOperacionTableSeeder::class,
            NivelAtencionTableSeeder::class,
            TipologiasTableSeeder::class,
            SubTipologiasTableSeeder::class

        ]);
    }
}
