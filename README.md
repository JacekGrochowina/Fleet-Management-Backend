## Tabele

#### Drivers (kierowcy)

| Parametr     | Typ      | Opis                      |
| :----------- | :------- | :------------------------ |
| `id`         | `number` | Identyfikator kierowcy    |
| `name`       | `string` | Imię kierowcy             |
| `surname`    | `string` | Nazwisko kierowcy         |
| `pesel`      | `string` | Numer pesel kierowcy      |
| `hourlyRate` | `string` | Stawka godzinowa kierowcy |

#### Vehicles (pojazdy)

| Parametr             | Typ      | Opis                        |
| :------------------- | :------- | :-------------------------- |
| `id`                 | `number` | Identyfikator pojazdu       |
| `brand`              | `string` | Marka pojazdu               |
| `model`              | `string` | Model pojazdu               |
| `yearManufacture`    | `string` | Rok produkcji pojazdu       |
| `vin`                | `string` | Numer VIN pojazdu           |
| `fuelType`           | `string` | Typ paliwa pojazdu          |
| `registrationNumber` | `string` | Numer rejestracyjny pojazdu |
| `avgFuelConsumption` | `string` | Średnie spalanie pojazdu    |
| `vehicleType`        | `string` | Typ pojazdu                 |

#### Routes (trasy)

| Parametr             | Typ       | Opis                           |
| :------------------- | :-------- | :----------------------------- |
| `id`                 | `number`  | Identyfikator trasy            |
| `vehicle`            | `Vehicle` | Pojazd                         |
| `driver`             | `Driver`  | Kierowca                       |
| `dateStart`          | `string`  | Data startu trasy              |
| `dateFinish`         | `string`  | Data końca trasy               |
| `placeStart`         | `string`  | Miejsce startu trasy           |
| `placeFinish`        | `string`  | Miejsce końca trasy            |
| `loadType`           | `string`  | Typ ładunku                    |
| `lengthRoute`        | `string`  | Długość trasy                  |
| `fuelCosts`          | `number`  | Koszty paliwa                  |
| `expeditionTime`     | `number`  | Czas trwania ekspedycji        |
| `driverSalary`       | `number`  | Wypłata kierowcy za ekspedycję |
| `profitExpedition`   | `number`  | Przychód za ekspedycję         |
| `incomeExpedition`   | `number`  | Zysk za ekspedycję             |
| `expensesExpedition` | `number`  | Koszty za ekspedycję           |

# API Referencje

#### Domena główna

```http
  https://czprogramy.cba.pl/php/php_rest_myblog-master
```

## Drivers (kierowcy)

#### Get Drivers

```http
  POST /api/driver/read.php
```

#### Get Driver

```http
  POST /api/driver/read_single.php
```

| Parametr | Typ      | Opis                   |
| :------- | :------- | :--------------------- |
| `id`     | `number` | Identyfikator kierowcy |

#### Create Drivers

```http
  POST /api/driver/create.php
```

| Parametr     | Typ      | Opis                      |
| :----------- | :------- | :------------------------ |
| `name`       | `string` | Imię kierowcy             |
| `surname`    | `string` | Nazwisko kierowcy         |
| `pesel`      | `string` | Numer pesel kierowcy      |
| `hourlyRate` | `string` | Stawka godzinowa kierowcy |

#### Update Driver

```http
  POST /api/driver/update.php
```

| Parametr     | Typ      | Opis                      |
| :----------- | :------- | :------------------------ |
| `id`         | `number` | Identyfikator kierowcy    |
| `name`       | `string` | Imię kierowcy             |
| `surname`    | `string` | Nazwisko kierowcy         |
| `pesel`      | `string` | Numer pesel kierowcy      |
| `hourlyRate` | `string` | Stawka godzinowa kierowcy |

#### Delete Driver

```http
  POST /api/driver/delete.php
```

| Parametr | Typ      | Opis                   |
| :------- | :------- | :--------------------- |
| `id`     | `number` | Identyfikator kierowcy |

## Twórcy

- [@JacekGrochowina](https://github.com/JacekGrochowina)
- [@Czesiek972](https://github.com/Czesiek972)
