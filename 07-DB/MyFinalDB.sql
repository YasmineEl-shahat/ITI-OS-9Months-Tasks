PGDMP     
    ;            	    y            Dummy    13.3    13.3     ?           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            ?           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ?           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ?           1262    49424    Dummy    DATABASE     k   CREATE DATABASE "Dummy" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.1252';
    DROP DATABASE "Dummy";
                postgres    false            ?            1259    49426    departments    TABLE     ?   CREATE TABLE public.departments (
    dname character varying(50),
    dnum integer NOT NULL,
    mgrssn integer,
    "MGRStart Date" date
);
    DROP TABLE public.departments;
       public         heap    postgres    false            ?            1259    49429 	   dependent    TABLE     ?   CREATE TABLE public.dependent (
    essn integer NOT NULL,
    dependent_name character varying(255) NOT NULL,
    sex character varying(255),
    bdate timestamp with time zone
);
    DROP TABLE public.dependent;
       public         heap    postgres    false            ?            1259    49435    employee    TABLE       CREATE TABLE public.employee (
    fname character varying(50),
    lname character varying(50),
    ssn integer NOT NULL,
    bdate timestamp with time zone,
    address character varying(50),
    sex character varying(50),
    salary integer,
    superssn integer,
    dno integer
);
    DROP TABLE public.employee;
       public         heap    postgres    false            ?            1259    49438    project    TABLE     ?   CREATE TABLE public.project (
    pname character varying(50),
    pnumber integer NOT NULL,
    plocation character varying(50),
    city character varying(50),
    dnum integer
);
    DROP TABLE public.project;
       public         heap    postgres    false            ?            1259    49441 	   works_for    TABLE     j   CREATE TABLE public.works_for (
    essn integer NOT NULL,
    pno integer NOT NULL,
    hours integer
);
    DROP TABLE public.works_for;
       public         heap    postgres    false            ?          0    49426    departments 
   TABLE DATA           K   COPY public.departments (dname, dnum, mgrssn, "MGRStart Date") FROM stdin;
    public          postgres    false    200   I       ?          0    49429 	   dependent 
   TABLE DATA           E   COPY public.dependent (essn, dependent_name, sex, bdate) FROM stdin;
    public          postgres    false    201   ?       ?          0    49435    employee 
   TABLE DATA           a   COPY public.employee (fname, lname, ssn, bdate, address, sex, salary, superssn, dno) FROM stdin;
    public          postgres    false    202   ~        ?          0    49438    project 
   TABLE DATA           H   COPY public.project (pname, pnumber, plocation, city, dnum) FROM stdin;
    public          postgres    false    203   %"       ?          0    49441 	   works_for 
   TABLE DATA           5   COPY public.works_for (essn, pno, hours) FROM stdin;
    public          postgres    false    204   ?"       2           2606    49445    departments pk_departments 
   CONSTRAINT     Z   ALTER TABLE ONLY public.departments
    ADD CONSTRAINT pk_departments PRIMARY KEY (dnum);
 D   ALTER TABLE ONLY public.departments DROP CONSTRAINT pk_departments;
       public            postgres    false    200            5           2606    49447    dependent pk_dependant 
   CONSTRAINT     f   ALTER TABLE ONLY public.dependent
    ADD CONSTRAINT pk_dependant PRIMARY KEY (essn, dependent_name);
 @   ALTER TABLE ONLY public.dependent DROP CONSTRAINT pk_dependant;
       public            postgres    false    201    201            7           2606    49449    employee pk_employee 
   CONSTRAINT     S   ALTER TABLE ONLY public.employee
    ADD CONSTRAINT pk_employee PRIMARY KEY (ssn);
 >   ALTER TABLE ONLY public.employee DROP CONSTRAINT pk_employee;
       public            postgres    false    202            :           2606    49451    project pk_project 
   CONSTRAINT     U   ALTER TABLE ONLY public.project
    ADD CONSTRAINT pk_project PRIMARY KEY (pnumber);
 <   ALTER TABLE ONLY public.project DROP CONSTRAINT pk_project;
       public            postgres    false    203            >           2606    49453    works_for pk_works_for 
   CONSTRAINT     [   ALTER TABLE ONLY public.works_for
    ADD CONSTRAINT pk_works_for PRIMARY KEY (essn, pno);
 @   ALTER TABLE ONLY public.works_for DROP CONSTRAINT pk_works_for;
       public            postgres    false    204    204            3           1259    49454    fki_fk_dependent    INDEX     F   CREATE INDEX fki_fk_dependent ON public.dependent USING btree (essn);
 $   DROP INDEX public.fki_fk_dependent;
       public            postgres    false    201            8           1259    49455    fki_fk_project    INDEX     B   CREATE INDEX fki_fk_project ON public.project USING btree (dnum);
 "   DROP INDEX public.fki_fk_project;
       public            postgres    false    203            ;           1259    49456    fki_fk_works_for    INDEX     E   CREATE INDEX fki_fk_works_for ON public.works_for USING btree (pno);
 $   DROP INDEX public.fki_fk_works_for;
       public            postgres    false    204            <           1259    49457    fki_fk_works_for_2    INDEX     H   CREATE INDEX fki_fk_works_for_2 ON public.works_for USING btree (essn);
 &   DROP INDEX public.fki_fk_works_for_2;
       public            postgres    false    204            ?           2606    49458    dependent fk_dependent    FK CONSTRAINT     ?   ALTER TABLE ONLY public.dependent
    ADD CONSTRAINT fk_dependent FOREIGN KEY (essn) REFERENCES public.employee(ssn) NOT VALID;
 @   ALTER TABLE ONLY public.dependent DROP CONSTRAINT fk_dependent;
       public          postgres    false    201    202    2871            @           2606    49486    employee fk_employee    FK CONSTRAINT     ?   ALTER TABLE ONLY public.employee
    ADD CONSTRAINT fk_employee FOREIGN KEY (superssn) REFERENCES public.employee(ssn) NOT VALID;
 >   ALTER TABLE ONLY public.employee DROP CONSTRAINT fk_employee;
       public          postgres    false    2871    202    202            A           2606    49463    project fk_project    FK CONSTRAINT     ?   ALTER TABLE ONLY public.project
    ADD CONSTRAINT fk_project FOREIGN KEY (dnum) REFERENCES public.departments(dnum) NOT VALID;
 <   ALTER TABLE ONLY public.project DROP CONSTRAINT fk_project;
       public          postgres    false    2866    203    200            B           2606    49468    works_for fk_works_for    FK CONSTRAINT     ?   ALTER TABLE ONLY public.works_for
    ADD CONSTRAINT fk_works_for FOREIGN KEY (pno) REFERENCES public.project(pnumber) NOT VALID;
 @   ALTER TABLE ONLY public.works_for DROP CONSTRAINT fk_works_for;
       public          postgres    false    203    2874    204            C           2606    49473    works_for fk_works_for_2    FK CONSTRAINT     ?   ALTER TABLE ONLY public.works_for
    ADD CONSTRAINT fk_works_for_2 FOREIGN KEY (essn) REFERENCES public.employee(ssn) NOT VALID;
 B   ALTER TABLE ONLY public.works_for DROP CONSTRAINT fk_works_for_2;
       public          postgres    false    202    204    2871            ?   D   x?Eɱ?0D???%p@??x???G?K??zsL?NF?U?R?d.??[O?j*?<?J?!"?C??      ?   ?   x?m?=k?@???W?T$?G?n????.??g?e0??9?K?W?D?l?:? ???ܙz?է?j?@e??v?z?Ω:?"?%??F?/?jJ?: Z??V??F1uW?K?[K<??O	??S?$??)?S?2?v)???%?^9p?⭌"?K???S?n?????.X?3?b???? ?[??B??Y??!c9 + ?d?޴?w??V?      ?   ?  x?]?Ok?0???O?{Q?K??f?t!)l????kQ?ZdCH>???6Y?`??޼Q?mU?AJ?????BR1!~,? H??{?n??Ӽ????ZH????v8"?)???ҹ??+4??r??%????پ?޿???3?	͞?y???<????\??qh{8?????+?T???0j|;2?C??^?,I}?IA+i͢P^?????,?????k?s??}?z??X???H?m?3?(??H?۔o??(?t+?Ly Nl?3????????|?[5w?Zd?C!????PW'????r?W?w??gӼ9u??x?
?:[???=Pт?Z??IT?%Y????ud??0␸ly?P?5?ّ?u?ا????
h{?X?e|
#?????ۃ???_7Y??$`??      ?   ?   x?e?K
?0??ur?9?Ԫu]Ju㋺A&M4m5P???6Rw?|3????*??!?bE"Cj?-??
?Z'??i??U?*????wʴ???Ŗ?8?N?\?? ?\ǻ?So?Ի:Gf,*?bv??73?jy"_ZX??JlD?l??H?PC>???ŚEA?#t???u&?? ?JN      ?   _   x?]?K? ?u9Lßz???U??&??E??"?Yu????????O?????9/??+T*5SUے??
h?X췖?!Y)R? |?'=     