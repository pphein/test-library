--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.10
-- Dumped by pg_dump version 9.6.10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: _books; Type: TABLE; Schema: public; Owner: smukvhrxaqmwmj
--

CREATE TABLE public._books (
    id smallint,
    title character varying(28) DEFAULT NULL::character varying,
    author character varying(8) DEFAULT NULL::character varying,
    summary character varying(10) DEFAULT NULL::character varying,
    price integer,
    category_id smallint,
    cover character varying(32) DEFAULT NULL::character varying,
    book character varying(12) DEFAULT NULL::character varying,
    created_date character varying(19) DEFAULT NULL::character varying,
    modified_date character varying(19) DEFAULT NULL::character varying
);


ALTER TABLE public._books OWNER TO smukvhrxaqmwmj;

--
-- Name: _categories; Type: TABLE; Schema: public; Owner: smukvhrxaqmwmj
--

CREATE TABLE public._categories (
    id smallint,
    name character varying(11) DEFAULT NULL::character varying,
    remark character varying(24) DEFAULT NULL::character varying,
    created_date character varying(19) DEFAULT NULL::character varying,
    modified_date character varying(19) DEFAULT NULL::character varying
);


ALTER TABLE public._categories OWNER TO smukvhrxaqmwmj;

--
-- Name: _comments; Type: TABLE; Schema: public; Owner: smukvhrxaqmwmj
--

CREATE TABLE public._comments (
    comment_id smallint,
    comment_post_id smallint,
    comment_date character varying(19) DEFAULT NULL::character varying,
    comment_content character varying(14) DEFAULT NULL::character varying
);


ALTER TABLE public._comments OWNER TO smukvhrxaqmwmj;

--
-- Name: _order_items; Type: TABLE; Schema: public; Owner: smukvhrxaqmwmj
--

CREATE TABLE public._order_items (
    id smallint,
    book_id smallint,
    bookname character varying(28) DEFAULT NULL::character varying,
    user_id smallint
);


ALTER TABLE public._order_items OWNER TO smukvhrxaqmwmj;

--
-- Name: _orders; Type: TABLE; Schema: public; Owner: smukvhrxaqmwmj
--

CREATE TABLE public._orders (
    id character varying(1) DEFAULT NULL::character varying,
    name character varying(1) DEFAULT NULL::character varying,
    email character varying(1) DEFAULT NULL::character varying,
    phone character varying(1) DEFAULT NULL::character varying,
    adress character varying(1) DEFAULT NULL::character varying,
    status character varying(1) DEFAULT NULL::character varying,
    created_date character varying(1) DEFAULT NULL::character varying,
    modified_date character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._orders OWNER TO smukvhrxaqmwmj;

--
-- Name: _tmp_book_items; Type: TABLE; Schema: public; Owner: smukvhrxaqmwmj
--

CREATE TABLE public._tmp_book_items (
    id character varying(1) DEFAULT NULL::character varying,
    tmp_book_id character varying(1) DEFAULT NULL::character varying,
    tmp_book_title character varying(1) DEFAULT NULL::character varying,
    user_id character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._tmp_book_items OWNER TO smukvhrxaqmwmj;

--
-- Name: _user; Type: TABLE; Schema: public; Owner: smukvhrxaqmwmj
--

CREATE TABLE public._user (
    id smallint,
    name character varying(7) DEFAULT NULL::character varying,
    password character varying(32) DEFAULT NULL::character varying,
    email character varying(14) DEFAULT NULL::character varying,
    user_registered character varying(19) DEFAULT NULL::character varying,
    admin smallint
);


ALTER TABLE public._user OWNER TO smukvhrxaqmwmj;

--
-- Data for Name: _books; Type: TABLE DATA; Schema: public; Owner: smukvhrxaqmwmj
--

COPY public._books (id, title, author, summary, price, category_id, cover, book, created_date, modified_date) FROM stdin;
1	asdfasdf	asdfasdf	asdfasdf	555	60	asdfasdf.png		2021-08-02 19:36:05	2021-08-02 19:36:05
2	မဂၤလာပါ 	အောင်	 asdfasdf 	32323	60	မဂၤလာပါ .png	မဂၤလာပါ .pdf	2021-08-02 19:36:29	2021-08-02 23:04:59
3	အိုရှိုး၏ သေခဆုံးခြင်းအနုပညာ	အောင်မေဃ	အောင်မေ	222	60	အိုရှိုး၏ သေခဆုံးခြင်းအနုပညာ.png		2021-08-02 19:37:20	2021-08-02 19:37:20
\.


--
-- Data for Name: _categories; Type: TABLE DATA; Schema: public; Owner: smukvhrxaqmwmj
--

COPY public._categories (id, name, remark, created_date, modified_date) FROM stdin;
60	magazine	new	2020-02-27 14:16:19	2020-02-27 14:16:19
61	Laravel	Framework	2020-02-27 14:32:53	2020-02-27 14:32:53
62	PHP	programming	2020-02-27 15:10:46	2020-02-27 15:10:46
63	Progarmming	Framework	2020-03-30 23:34:11	2020-03-30 23:34:11
64	OOP	ObjectOrientedProgamming	2020-03-31 19:53:30	2020-03-31 19:53:30
\.


--
-- Data for Name: _comments; Type: TABLE DATA; Schema: public; Owner: smukvhrxaqmwmj
--

COPY public._comments (comment_id, comment_post_id, comment_date, comment_content) FROM stdin;
1	3	2021-08-02 19:38:18	adsfa addfasdf
2	3	2021-08-02 19:38:23	asdfasdf
\.


--
-- Data for Name: _order_items; Type: TABLE DATA; Schema: public; Owner: smukvhrxaqmwmj
--

COPY public._order_items (id, book_id, bookname, user_id) FROM stdin;
15	3	အိုရှိုး၏ သေခဆုံးခြင်းအနုပညာ	1
16	2	မဂၤလာပါ 	1
17	1	asdfasdf	1
\.


--
-- Data for Name: _orders; Type: TABLE DATA; Schema: public; Owner: smukvhrxaqmwmj
--

COPY public._orders (id, name, email, phone, adress, status, created_date, modified_date) FROM stdin;
\.


--
-- Data for Name: _tmp_book_items; Type: TABLE DATA; Schema: public; Owner: smukvhrxaqmwmj
--

COPY public._tmp_book_items (id, tmp_book_id, tmp_book_title, user_id) FROM stdin;
\.


--
-- Data for Name: _user; Type: TABLE DATA; Schema: public; Owner: smukvhrxaqmwmj
--

COPY public._user (id, name, password, email, user_registered, admin) FROM stdin;
1	pyae123	a27aaa7b9f70aa8fcdbb7e0c1727bcce	pyae@gmail.com	2021-08-08 14:48:11	1
2	hein123	04d543ffe74361ee9fa5995c01483033	hein@gmail.com	2021-08-08 15:45:40	0
\.


--
-- PostgreSQL database dump complete
--

