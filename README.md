# CRUD-MediCarePro
O CRUD-MediCarePro é um projeto de um sistema de gerenciamento de pacientes e médicos, onde é possível realizar operações de cadastro, leitura, atualização e exclusão de registros.

O projeto foi desenvolvido utilizando o framework Laravel 7, banco de dados MySQL, Laravel Blade no Front-End com Bootstrap e Docker para a criação dos containers.

## Funcionalidades
- CRUD de Pacientes
- CRUD de Médicos
- CRUD de Atendimentos
- Exportação de dados em CSV
- Relatório de Atendimentos por Médico em CSV e PDF

## Requisitos
- Git
- Docker
- Docker Compose

## Instalação

1. Clone o repositório
```bash
git clone https://github.com/Hugobsan/CRUD-MediCarePro.git

cd CRUD-MediCarePro
```

2. O arquivo .env já está configurado para rodar com Docker (eu subi ele para o repositório para este propósito), porém, caso deseje rodar localmente, altere as configurações de banco de dados no arquivo .env.

3. Execute o comando abaixo para subir os containers
O comando abaixo irá subir os containers e instalar as dependências do projeto
```bash
docker-compose up -d
```

4. Execute o comando abaixo para rodar as migrations e seeders
Obs: Os seeders irão gerar automaticamente 10 registros de pacientes, medicos e atendimentos
```bash
docker-compose exec app php artisan migrate --seed
```

5. Acesse o projeto em http://localhost:8000

6. (Opcional) Eu preparei a aplicação com diversos testes para cada funcionalidade. Caso deseje rodar os testes, execute o comando abaixo:
```bash
docker-compose exec app php artisan test
```