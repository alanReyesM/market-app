CREATE TABLE users (
id BIGSERIAL PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
mobile_number VARCHAR(20) NOT NULL,
ide_number VARCHAR(15) NULL UNIQUE,
address TEXT NULL,
birthday DATE NULL,
email VARCHAR(200) NOT NULL UNIQUE,
password TEXT NOT NULL,
status BOOLEAN NOT NULL DEFAULT TRUE,
created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
deleted_at TIMESTAMPTZ NULL
);



CREATE TABLE public.countries (
  id SERIAL PRIMARY KEY,
  couname VARCHAR(100) NOT NULL UNIQUE,
  abbrev VARCHAR(10) NOT NULL UNIQUE,
  code VARCHAR(10) NOT NULL UNIQUE,
  created_at TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE public.regions (
  id SERIAL PRIMARY KEY,
  reginame VARCHAR(100) NOT NULL,
  regiabbrev VARCHAR(10) NOT NULL,
  regicode VARCHAR(10) NOT NULL,
  country_id INT NOT NULL,
  created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
  CONSTRAINT fk_regions_country FOREIGN KEY (country_id)
    REFERENCES public.countries(id) ON DELETE CASCADE,
  CONSTRAINT regions_unique_name_code UNIQUE (reginame, regicode)
);

CREATE TABLE public.cities (
  id SERIAL PRIMARY KEY,
  citiname VARCHAR(100) NOT NULL,
  citiabbrev VARCHAR(10) NOT NULL,
  citicode VARCHAR(10) NOT NULL,
  region_id INT NOT NULL,
  created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
  CONSTRAINT fk_cities_region FOREIGN KEY (region_id)
    REFERENCES public.regions(id) ON DELETE CASCADE,
  CONSTRAINT cities_unique_name_code UNIQUE (citiname, citicode)
);