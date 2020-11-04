create database SISTEMAESCOLAR;

use SISTEMAESCOLAR;

create table instituicao(
cnpj char(17) not null primary key,
nome varchar(80) not null,
telefone char(15) not null 
);

create table unidade(
codigo int unsigned auto_increment not null primary key,
nome varchar(80) not null,
telefone char(15) not null,
endereco varchar(80) not null,
instituicao_cnpj char(17) not null,
supervisao varchar(80) not null,
cooredenacao varchar(150) not null,
direcao varchar(150),
foreign key (instituicao_cnpj) references instituicao(cnpj) 
);

drop table unidade;

create table professor(
cpf char(14) not null,
nome varchar(80) not null,
endereco varchar(80) not null,
sexo char(1) not null,
telefone char(15) not null,
email varchar(100) not null,
curso varchar(50) not null
);

create table turma(
codigo int unsigned auto_increment not null primary key,
professor_cpf char(14) not null,
unidade_codigo int not null,
foreign key(professor_cpf) references professor(cpf),
foreign key(unidade_codigo) references unidade(codigo)
);

create table aluno(
matricula int unsigned auto_increment not null primary key,
nome varchar(80) not null,
endereco varchar(80) not null,
telefone char(15) not null,
sexo char(1) not null,
email varchar(100) not null,
curso varchar(50) not null,
turma_codigo int not null,
unidade_codigo int not null,
serie_periodo char(3) not null,
n_chamada int not null,
foreign key(turma_codigo) references turma(codigo),
foreign key(unidade_codigo) references unidade(codigo)
);

drop table aluno;

create table materia(
codigo int unsigned auto_increment not null primary key,
nome varchar(45) not null,
professor_cpf char(14) not null,
aluno_matricula int not null,
foreign key(professor_cpf) references professor(cpf),
foreign key(aluno_matricula) references aluno(matricula)
);

create table prova(
codigo int unsigned auto_increment not null primary key,
materia varchar(45) not null,
pontuacao double(6,2) not null,
dia date not null,
hora time not null,
resultado double(6,2) not null,
aluno_matricula int not null,
materia_codigo char(14) not null,
foreign key(aluno_matricula) references aluno(matricula),
foreign key(materia_codigo) references materia(codigo)
);

create table prova_has_professor(
prova_codigo int not null primary key,
professor_cpf char(14) not null,
foreign key(prova_codigo) references prova(codigo),
foreign key(professor_cpf) references professor(cpf)
);

create table usuario(
login varchar(90) not null primary key,
senha varchar(80) not null,
tipo char(3) not null,
aluno_matricula int unsigned not null,
professor_cpf char(14) not null,
unidade_codigo int unsigned not null,
foreign key(aluno_matricula) references aluno(matricula),
foreign key(professor_cpf) references professor(cpf),
foreign key(unidade_codigo) references unidade(codigo)
);

create table login(
email varchar(151) not null primary key,
senha int not null
);
