export const modelPersonalInformation = () => ({
  personalInformation: {
    code: false,
    name: false,
    lastname: false,
    second_lastname: false,
    rfc: false,
    curp: false,
    nss: false,
    cat_gender_id: false,
    cat_marital_status_id: false,
    cat_country_id: false,
    cat_state_id: false,
    birthdate: false,
    cat_educational_level_id: false,
    email: false,
    telephone: false,
    cellphone: false,
    skills: false
  }
});

export const modelPersonalEmergency = () => ({
  personalEmergency: {
    contact_name: false,
    contact_phone: false
  }
});

export const modelPersonalAdress = () => ({
  personalAdress: {
    state: false,
    town: false,
    neighborhood: false,
    city: false,
    zipcode: false,
    street: false,
    ext_num: false,
    int_num: false
  }
});

export const modelPersonalProfessional = () => ({
  personalProfessional: {
    company: false,
    position: false,
    start_date: false,
    end_date: false,
    description: false,
    achievements: false
  }
});

export const modelPersonalEducation = () => ({
  personalEducation: {
    school: false,
    title: false,
    education_status: false,
    start_date: false,
    end_date: false,
    description: false,
  }
});

export const modelPersonalCertifications = () => ({
  personalCertifications: {
    entify: false,
    name: false,
    description: false,
    start_date: false,
    end_date: false,
    credential_id: false,
    url: false
  }
});

export const modelPersonalBank = () => ({
  personalBank: {
    cat_bank_account_type: false,
    clabe: false,
    cat_bank_id: false
  }
});

export const modelPersonalLabor = () => ({
  personalLabor: {
    cat_employment_type_id: false,
    date: false,
    cat_contract_type_id: false,
    cat_unit_id: false,
    position_id: false,
    cat_employment_location_id: false,
    has_kit: false
  }
});
