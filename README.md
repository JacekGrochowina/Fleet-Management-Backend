## Tabele

#### Drivers (kierowcy) - TBTRA_KIEROWCY

| Parametr     | Typ      | Opis                      |
| :----------- | :------- | :------------------------ |
| `id`         | `number` | Identyfikator kierowcy    |
| `name`       | `string` | Imię kierowcy             |
| `surname`    | `string` | Nazwisko kierowcy         |
| `pesel`      | `string` | Numer pesel kierowcy      |
| `hourlyRate` | `string` | Stawka godzinowa kierowcy |

#### Vehicles (pojazdy) - TBTRA_POJAZDY

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

#### Routes (trasy) - TBTRA_TRASY

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

#### Create Driver

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

## Vehicles (pojazdy)

#### Get Vehicles

```http
  POST /api/vehicle/read.php
```

#### Get Vehicle

```http
  POST /api/vehicle/read_single.php
```

| Parametr | Typ      | Opis                  |
| :------- | :------- | :-------------------- |
| `id`     | `number` | Identyfikator pojazdu |

#### Create Vehicle

```http
  POST /api/vehicle/create.php
```

| Parametr             | Typ      | Opis                        |
| :------------------- | :------- | :-------------------------- |
| `brand`              | `string` | Marka pojazdu               |
| `model`              | `string` | Model pojazdu               |
| `yearManufacture`    | `string` | Rok produkcji pojazdu       |
| `vin`                | `string` | Numer VIN pojazdu           |
| `fuelType`           | `string` | Typ paliwa pojazdu          |
| `registrationNumber` | `string` | Numer rejestracyjny pojazdu |
| `avgFuelConsumption` | `string` | Średnie spalanie pojazdu    |
| `vehicleType`        | `string` | Typ pojazdu                 |

#### Update Vehicle

```http
  POST /api/vehicle/update.php
```

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

#### Delete Vehicle

```http
  POST /api/vehicle/delete.php
```

| Parametr | Typ      | Opis                  |
| :------- | :------- | :-------------------- |
| `id`     | `number` | Identyfikator pojazdu |

## Routes (trasy)

#### Get Routes

```http
  POST /api/route/read.php
```

#### Get Route

```http
  POST /api/route/read_single.php
```

| Parametr | Typ      | Opis                |
| :------- | :------- | :------------------ |
| `id`     | `number` | Identyfikator trasy |

#### Create Route

```http
  POST /api/route/create.php
```

| Parametr             | Typ       | Opis                           |
| :------------------- | :-------- | :----------------------------- |
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

#### Update Route

```http
  POST /api/route/update.php
```

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

#### Delete Route

```http
  POST /api/route/delete.php
```

| Parametr | Typ      | Opis                |
| :------- | :------- | :------------------ |
| `id`     | `number` | Identyfikator trasy |

## Twórcy

- [@JacekGrochowina](https://github.com/JacekGrochowina)
- [@Czesiek972](https://github.com/Czesiek972)
