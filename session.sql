DROP TABLE `ci_sessions`;

CREATE TABLE IF NOT EXISTS  `ci_sessions` (
    id varchar(40) DEFAULT '0' NOT NULL,
    ip_address varchar(45) DEFAULT '0' NOT NULL,
    user_agent varchar(120) NOT NULL,
    last_activity int(10) unsigned DEFAULT 0 NOT NULL,
    timestamp TIMESTAMP(6) DEFAULT CURRENT_TIMESTAMP(6),
    data text NOT NULL,
    PRIMARY KEY (id),
    KEY `last_activity_idx` (`last_activity`)
);